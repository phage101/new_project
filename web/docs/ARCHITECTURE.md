# LOGIFY — Architecture & Design Decisions

This document describes the architecture and design choices for the LOGIFY admin panel. The system delivers exactly six modules: Authentication, Dashboard, User Management, Audit Trail, Profile, and Two-Factor Authentication (2FA).

---

## Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 11 |
| Templating | Blade |
| Frontend CSS | CoreUI 5 (Bootstrap-based) |
| Asset Pipeline | Vite |
| Database | MySQL 8.0 |
| ORM | Eloquent |

No SPAs, no JavaScript frameworks, no API-first architecture. Server-rendered Blade views are the deliberate choice for this admin panel.

---

## Application Layers

### Routes & Controllers

**Pattern:** RESTful routes mapped to dedicated controllers per module.

```
GET  /login            → Auth\AuthController@showLogin
POST /login            → Auth\AuthController@login
POST /logout           → Auth\AuthController@logout

GET  /dashboard        → DashboardController@index

GET  /users            → UserController@index
POST /users            → UserController@store
GET  /users/{id}/edit  → UserController@edit
PUT  /users/{id}       → UserController@update
POST /users/{id}/deactivate → UserController@deactivate

GET  /audit            → AuditTrailController@index

GET  /profile          → ProfileController@show
PUT  /profile          → ProfileController@update

GET  /two-factor/setup    → TwoFactorController@setup
POST /two-factor/enable   → TwoFactorController@enable
POST /two-factor/verify   → TwoFactorController@verify
POST /two-factor/disable  → TwoFactorController@disable
```

All routes except `/login` and `/two-factor/verify` require `auth` middleware. User Management routes additionally require `permission:users.manage`.

### Views & Layouts

```
layouts/app.blade.php              (Authenticated layout — sidebar + header + footer)
├── components/sidebar.blade.php   (Menu driven by config/navigation.php)
├── components/header.blade.php    (Top bar with user menu)
├── components/footer.blade.php
└── @yield('content')

layouts/auth.blade.php             (Guest layout — login and 2FA challenge)
```

Module views:

```
views/
├── auth/
│   ├── login.blade.php
│   └── two-factor.blade.php       (2FA code entry during login)
├── dashboard/
│   └── index.blade.php
├── users/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
├── audit/
│   └── index.blade.php
└── profile/
    ├── show.blade.php
    └── edit.blade.php
```

### Models

```
User
├── roles()          → belongsToMany Role (via role_user pivot)
├── permissions()    → derived through roles
├── activityLogs()   → hasMany ActivityLog
└── twoFactorSecret  → encrypted column on users table

Role
└── permissions()    → belongsToMany Permission

Permission
└── roles()          → belongsToMany Role

ActivityLog
└── user()           → belongsTo User
```

RBAC is **core** to this application. The `HasRoles` trait is applied to the `User` model. User Management and Audit Trail both depend on it.

### Assets

```
resources/scss/app.scss
├── @use "@coreui/coreui/scss/coreui"   (CoreUI framework)
└── Custom overrides                    (Brand colors, layout tweaks)

resources/js/app.js
├── import '@coreui/coreui'             (Dropdowns, modals, sidebar)
└── Theme switcher logic                (localStorage + data attributes)
```

---

## Module Architecture

### 1. Authentication

- `Auth\AuthController` handles login, logout
- On login:
  1. Validate credentials
  2. If 2FA enabled → redirect to `/two-factor/verify`
  3. If 2FA not enabled → log in, redirect to dashboard
  4. Log event to `activity_logs`
- CSRF on all POST forms
- Failed login rate-limited via `RateLimiter`

### 2. Dashboard

- `DashboardController` queries total users, active users, recent `activity_logs`
- Graceful fallback if DB is unavailable
- Read-only view

### 3. User Management

**Controller:** `UserController`  
**Access:** `auth` + `permission:users.manage`

- Index — paginated list with search
- Create — name, email, role, password
- Edit — update name, email, role
- Deactivate — sets `active = false`, does not delete
- Every mutation logs to `activity_logs`

### 4. Audit Trail

**Controller:** `AuditTrailController`  
**Access:** `auth` + `permission:audit.view`

- Read-only paginated view of `activity_logs`
- Filters: date range, user, action type
- Logs cannot be edited or deleted through the UI

`ActivityLog` schema:
```
id, user_id, action, model_type, model_id, ip_address, created_at
```

### 5. Profile

**Controller:** `ProfileController`  
**Access:** `auth` — own profile only

- View: name, email, role, 2FA status
- Edit name, email
- Change password (requires current password confirmation)
- 2FA status with enable/disable link

### 6. Two-Factor Authentication (2FA)

**Controller:** `TwoFactorController`  
TOTP-based (Google Authenticator compatible).

**Enrollment:**
1. User visits Profile → "Enable 2FA"
2. Server generates TOTP secret (stored encrypted in `users.two_factor_secret`)
3. QR code shown; user scans with authenticator app
4. User confirms with code → enrollment complete
5. Recovery codes generated, shown once, stored hashed

**Login:**
1. Credentials verified → if 2FA enabled, session flag `two_factor_pending` set
2. User redirected to `/two-factor/verify`
3. Code verified → session flag cleared, login complete

**Disable:**
1. User visits Profile → "Disable 2FA"
2. Requires current password confirmation
3. Secret and recovery codes cleared from DB

---

## Data Flow

### Login with 2FA

```
POST /login
  → Validate credentials
  → Auth::attempt()
  → Check user.two_factor_secret
  → If set:   session['two_factor_pending'] = true → redirect /two-factor/verify
  → If unset: Auth::login() → redirect /dashboard
  → Log event to activity_logs
```

### User Deactivation

```
POST /users/{id}/deactivate
  → auth + permission middleware
  → User::find($id)->update(['active' => false])
  → ActivityLog::create([...])
  → redirect back with success flash
```

### Audit Log Write

```php
// Called inside any mutating controller method
ActivityLog::create([
    'user_id'    => auth()->id(),
    'action'     => 'Deactivated user john@example.com',
    'model_type' => 'User',
    'model_id'   => $user->id,
    'ip_address' => request()->ip(),
]);
```

---

## Security Decisions

| Concern | Approach |
|---------|---------|
| Authentication | Laravel session auth with CSRF tokens |
| 2FA | TOTP (RFC 6238), secret stored encrypted |
| Authorization | Role + Permission middleware per route |
| Audit logs | Immutable via UI — no delete or edit endpoints |
| User deactivation | Soft disable (`active` flag) — preserves audit history |
| Password change | Requires current password confirmation |
| Rate limiting | Applied on login route via `RateLimiter` |

---

## File Reference

| Path | Purpose |
|------|---------|
| `app/Http/Controllers/Auth/AuthController.php` | Login, logout |
| `app/Http/Controllers/DashboardController.php` | Dashboard metrics |
| `app/Http/Controllers/UserController.php` | User CRUD + deactivate |
| `app/Http/Controllers/AuditTrailController.php` | Audit log viewer |
| `app/Http/Controllers/ProfileController.php` | Profile view + edit |
| `app/Http/Controllers/TwoFactorController.php` | 2FA setup + verify |
| `app/Http/Middleware/EnsureUserHasPermission.php` | Permission enforcement |
| `app/Models/User.php` | User model with HasRoles |
| `app/Models/Role.php` | Role model |
| `app/Models/Permission.php` | Permission model |
| `app/Models/ActivityLog.php` | Audit trail record |
| `app/Models/Concerns/HasRoles.php` | RBAC trait |
| `config/navigation.php` | Sidebar menu structure |
| `routes/web.php` | All module routes |
| `resources/views/layouts/app.blade.php` | Authenticated layout |
| `resources/views/layouts/auth.blade.php` | Guest layout |


---

## When to Add More

### Add Livewire if you need:
- Real-time validation
- Live search
- Instant form updates
- Dashboard component state

### Add HTMX if you need:
- AJAX without writing fetch code
- Inline editing
- Progressive enhancement

### Add API if you need:
- Mobile app backend
- External integrations
- Decoupled frontend (React/Vue)

### Add WebSockets if you need:
- Real-time notifications
- Live collaboration
- Multi-user updates

---

## Resources

- **Laravel Guide:** https://laravel.com/docs
- **Blade Syntax:** https://laravel.com/docs/blade
- **Eloquent ORM:** https://laravel.com/docs/eloquent
- **CoreUI CSS:** https://coreui.io/bootstrap/
- **Chart.js Docs:** https://www.chartjs.org/
- **Vite Guide:** https://vitejs.dev/

---

This architecture prioritizes **simplicity, maintainability, and developer experience** while remaining **production-ready and scalable**.
