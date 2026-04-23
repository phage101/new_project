# LOGIFY — Admin Panel

A Laravel 11 + CoreUI 5 admin panel delivering six focused modules: Authentication, Dashboard, User Management, Audit Trail, Profile, and Two-Factor Authentication.

## Modules

| # | Module | Description |
|---|--------|-------------|
| 1 | **Authentication** | Secure login and logout using Laravel session auth |
| 2 | **Dashboard** | Main landing view after login with key system metrics |
| 3 | **User Management** | Create, read, update, and deactivate users |
| 4 | **Audit Trail** | Log and view all significant system and user actions |
| 5 | **Profile** | Users can view and edit their own profile information |
| 6 | **Two-Factor Authentication (2FA)** | Secondary verification layer for login security |

No other features are in scope.

## Quick Start

### Prerequisites
- PHP 8.2+
- Composer
- Node.js 20+ and npm
- MySQL 8.0+

### Installation

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
# Edit .env with your DB credentials
php artisan migrate
php artisan db:seed
npm run build
php artisan serve
```

Visit `http://localhost:8000` and log in.

For Docker-based setup, see [DOCKER.md](DOCKER.md).

---

## Architecture Overview

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Auth/AuthController.php          # Login, logout
│   │   ├── DashboardController.php          # Dashboard metrics
│   │   ├── UserController.php               # User management CRUD
│   │   ├── AuditTrailController.php         # Audit log viewer
│   │   ├── ProfileController.php            # Profile view and edit
│   │   └── TwoFactorController.php          # 2FA setup and verification
│   └── Middleware/
│       └── EnsureUserHasPermission.php      # Role-based access control
├── Models/
│   ├── User.php                             # Core user model with HasRoles
│   ├── Role.php                             # Role model
│   ├── Permission.php                       # Permission model
│   ├── ActivityLog.php                      # Audit trail records
│   └── Concerns/HasRoles.php               # RBAC trait
resources/views/
├── layouts/
│   ├── app.blade.php                        # Authenticated layout
│   └── auth.blade.php                       # Guest layout (login/2FA)
├── components/
│   ├── sidebar.blade.php
│   ├── header.blade.php
│   └── breadcrumb.blade.php
├── auth/
│   ├── login.blade.php
│   └── two-factor.blade.php
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
routes/web.php                               # All module routes
config/navigation.php                        # Sidebar menu items
```

---

## Module Details

### 1. Authentication
- Session-based login and logout
- CSRF-protected login form
- Redirect to dashboard on success, back to login on failure
- Unauthenticated requests redirected to `/login`

### 2. Dashboard
- First page after login
- Displays system metrics: total users, active users, recent activity count
- Recent audit trail entries feed
- All data is DB-backed with graceful fallback if migrations are pending

### 3. User Management
- List all users with search and pagination
- Create new users with name, email, role
- Edit existing user details
- Deactivate users (soft disable, not delete)
- Admin-only access enforced via middleware

### 4. Audit Trail
- Every significant action (login, user create/edit/deactivate, profile change, 2FA events) is logged to `activity_logs`
- Audit log viewer lists entries with user, action, timestamp, and IP
- Read-only interface — logs cannot be deleted through the UI

### 5. Profile
- Authenticated users can view their own profile
- Edit name and email
- Change password (requires current password confirmation)
- 2FA status shown on profile page with enable/disable link

### 6. Two-Factor Authentication (2FA)
- TOTP-based 2FA (Google Authenticator compatible)
- Users enable 2FA from their profile page
- On login, if 2FA is enabled, a verification code is required before dashboard access
- Recovery codes generated and shown once at enrollment

---

## Navigation

`config/navigation.php` drives the sidebar menu. Current items:

```php
return [
    ['type' => 'item', 'label' => 'Dashboard',        'route' => 'dashboard',      'icon' => 'cil-speedometer'],
    ['type' => 'title', 'label' => 'Management'],
    ['type' => 'item', 'label' => 'Users',             'route' => 'users.index',    'icon' => 'cil-people'],
    ['type' => 'item', 'label' => 'Audit Trail',       'route' => 'audit.index',    'icon' => 'cil-list'],
    ['type' => 'title', 'label' => 'Account'],
    ['type' => 'item', 'label' => 'Profile',           'route' => 'profile.show',   'icon' => 'cil-user'],
];
```

---

## Deployment

```bash
npm run build
php artisan migrate --force
php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=PermissionSeeder
php artisan config:cache
php artisan route:cache
```

See [docs/SETUP.md](docs/SETUP.md) for full setup instructions.

