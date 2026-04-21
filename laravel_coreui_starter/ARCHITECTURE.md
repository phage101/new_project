# Architecture & Design Decisions

This document explains the core architecture and design choices made in the CoreUI + Laravel integration starter.

## Overview

The starter is a **server-rendered admin dashboard** using:
- **Backend:** Laravel 11 with Blade templating
- **Frontend:** CoreUI CSS framework + Chart.js for visualizations
- **Database:** MySQL with Eloquent ORM
- **Asset Pipeline:** Vite for modern module bundling

**Not included:** SPAs, API-first architecture, or extensive JavaScript frameworks. This is intentional for simplicity and developer productivity.

---

## Architecture Layers

### 1. Routes & Controllers (`routes/web.php`, `app/Http/Controllers/`)

**Pattern:** RESTful routes mapped to controllers returning Blade views.

```
GET /dashboard → DashboardController@index → views/dashboard/index.blade.php
GET /users → UserController@index → views/users/index.blade.php
POST /users → UserController@store → redirect to index
```

**Why this pattern:**
- Familiar to Laravel developers
- Built-in CSRF, auth, validation
- Easy to test with PHPUnit
- Server-rendered = no JavaScript hydration complexity

### 2. Views & Layouts (`resources/views/`)

**Pattern:** Blade layouts with reusable components.

```
layouts/app.blade.php          (Main authenticated layout)
├── components/sidebar.blade.php    (Navigation)
├── components/header.blade.php     (User menu, theme switcher)
├── components/footer.blade.php     (Footer)
└── @yield('content')               (Page-specific content)
```

**Why this pattern:**
- DRY principle — layout defined once
- Components are reusable across pages
- Breadcrumb auto-generated from route name
- Easy to maintain color schemes, spacing

### 3. Database Models (`app/Models/`)

**Pattern:** Eloquent models with traits and relationships.

```php
User
├── roles() → hasMany Role (via pivot)
├── permissions() → hasMany Permission (via roles)
└── activityLogs() → hasMany ActivityLog
```

**Why this pattern:**
- Relationship clarity in code
- Type-safe with PHPStan/IDE hints
- Automatic timestamps and soft deletes (if needed)
- Easy to scope queries (e.g., `User::where('role_id', 1)`)

### 4. Assets & Styling (`resources/js/`, `resources/scss/`)

**Pattern:** Vite bundles SCSS and JavaScript into single entry point.

```
resources/scss/app.scss
├── @use "@coreui/coreui/scss/coreui"    (CoreUI framework)
├── @use "@coreui/chartjs"               (Chart styling)
└── Custom overrides                     (Your brand colors)

resources/js/app.js
├── import '@coreui/coreui'              (Component JS: modals, dropdowns)
├── import Chart from 'chart.js/auto'    (Chart library)
└── Theme switcher logic                 (localStorage + data attributes)
```

**Why this pattern:**
- Single entry point for Vite
- Lazy loading not needed (admin dashboard is fast enough)
- CSS variables for theming (light/dark)
- CoreUI handles dropdowns, modals, tooltips natively

---

## Key Design Decisions

### 1. Blade Over React/Vue

**Decision:** Use Blade templating instead of a JavaScript framework.

**Rationale:**
- Faster initial page load (no JS hydration)
- Simpler deployment (no SPA build step)
- Built-in CSRF, auth, validation
- Better for admin dashboards (less interactivity needed)
- Easier for backend-focused teams

**Trade-off:** Limited real-time features without WebSockets/Livewire.

**If you need more interactivity:** Add Livewire or HTMX without replacing the whole stack.

### 2. Generic PageController for Simple Routes

**Decision:** Use a single `PageController@show()` for all demo section pages.

```php
PageController@show('forms', 'form-control') → views/pages/forms/form-control.blade.php
```

**Rationale:**
- Reduces boilerplate for showcase pages
- Each page is independent and stateless
- Easy to replace with real controllers later

**Trade-off:** Not suitable for complex pages with data fetching.

**Pattern:** For real features, create dedicated controllers:
```php
ProductController@index → queries DB, passes $products to view
UserController@edit → finds user, passes to edit form
```

### 3. RBAC as Opt-In

**Decision:** Provide models, migrations, and middleware scaffold but don't force RBAC into routes.

**Rationale:**
- Starter works immediately without auth complexity
- Developers can add RBAC when needed
- Middleware can be registered per-route without global impact
- HasRoles trait is optional

**If you need RBAC:**
1. Add `HasRoles` trait to User model
2. Register `EnsureUserHasPermission` middleware
3. Wrap protected routes with middleware

### 4. Database-Driven Dashboard (Graceful Fallback)

**Decision:** Dashboard queries the database but shows placeholders if migrations haven't run.

```php
// In DashboardController
try {
    $userCount = User::count();
} catch (QueryException $e) {
    // Migrations not yet run, show placeholder
    $userCount = 0;
}
```

**Rationale:**
- Works immediately after `php artisan serve`
- No hidden errors if migrations are pending
- Clear message to run migrations
- Safe for production deployments

### 5. CoreUI CSS Only (No React Components)

**Decision:** Use CoreUI as a CSS framework, not the React component library.

**Rationale:**
- No React dependency
- CSS is framework-agnostic (works with any backend)
- Smaller bundle size
- Easy to customize without re-learning component API

**Trade-off:** Must write components in HTML/CSS instead of React JSX.

### 6. Vite Over Laravel Mix

**Decision:** Use Vite instead of Mix for asset bundling.

**Rationale:**
- Vite is Laravel's modern standard (Mix is legacy)
- Faster hot reload during development
- Better tree-shaking and splitting
- Cleaner configuration

---

## Data Flow

### Request → Response Cycle

```
1. User visits http://localhost:8000/users

2. Route matched: Route::get('/users', [UserController::class, 'index'])

3. Middleware applied:
   - web (session, CSRF, etc.)
   - auth (verify logged in)
   - permission (optional, if added)

4. Controller executes:
   UserController::index() {
       $users = User::paginate(15);
       return view('users.index', compact('users'));
   }

5. View rendered:
   resources/views/users/index.blade.php {
       @extends('layouts.app')  // Sidebar + header injected
       @section('content')
           @foreach ($users as $user)
               <tr><td>{{ $user->name }}</td></tr>
           @endforeach
   }

6. Response sent to browser with:
   - HTML (from Blade)
   - CSS (from Vite)
   - JS (from Vite)
```

### Activity Logging

```
1. User performs action (create, edit, delete)

2. Controller calls:
   ActivityLog::create([
       'user_id' => auth()->id(),
       'action' => 'Created order #123',
       'model_type' => 'Order',
       'model_id' => 123,
   ]);

3. Record saved to database

4. Dashboard queries:
   ActivityLog::latest()->limit(8)->get()

5. Recent activity displayed in table
```

### Theme Switching

```
1. User clicks theme button in header

2. JavaScript event listener fires:
   button.addEventListener('click', () => {
       applyTheme('dark')
   })

3. app.js updates:
   document.documentElement.setAttribute('data-coreui-theme', 'dark')
   localStorage.setItem(THEME_KEY, 'dark')

4. CoreUI CSS applies theme-specific variables:
   [data-coreui-theme="dark"] {
       --cui-primary: #0066cc;  (dark mode value)
   }

5. Page re-renders with new colors

6. Preference persists across sessions via localStorage
```

---

## Customization Patterns

### Adding a CRUD Module

**File structure:**
```
app/Http/Controllers/ProductController.php
app/Models/Product.php
database/migrations/create_products_table.php
resources/views/products/
├── index.blade.php
├── create.blade.php
├── show.blade.php
└── edit.blade.php
```

**Steps:**
```bash
# Generate scaffolding
php artisan make:model Product -mrc

# Define migration (database/migrations/...)
# Define controller (app/Http/Controllers/ProductController.php)
# Define routes (routes/web.php)
# Create views (resources/views/products/...)
# Add menu item (config/navigation.php)
```

### Adding a Chart

**Pattern:** Add canvas to view, initialize in app.js.

```blade
<!-- resources/views/dashboard/monthly-revenue.blade.php -->
<canvas id="monthly-revenue-chart"></canvas>
```

```js
// resources/js/app.js
const monthlyRevenueChart = document.getElementById('monthly-revenue-chart')
if (monthlyRevenueChart) {
    new Chart(monthlyRevenueChart, {
        type: 'line',
        data: { /* ... */ }
    })
}
```

### Adding an API Endpoint

**Pattern:** Create an API route and return JSON.

```php
// routes/api.php
Route::get('/products', [ProductController::class, 'apiIndex']);

// ProductController
public function apiIndex() {
    return response()->json(Product::all());
}

// Client usage
fetch('/api/products').then(r => r.json()).then(data => {
    // Populate charts, tables, etc.
})
```

---

## Performance Considerations

### Rendering
- **Server-rendered HTML:** Fast, no client-side processing
- **Vite asset pipeline:** Tree-shaked CSS/JS, minimal bundle
- **Lazy-loaded images:** Consider `lazy` loading for avatars

### Database
- Use eager loading to avoid N+1 queries:
  ```php
  User::with('roles', 'activityLogs')->get()
  ```
- Index frequently queried columns:
  ```php
  $table->index(['user_id', 'created_at']);
  ```

### Caching
- Cache navigation config (static):
  ```php
  Cache::rememberForever('navigation', fn() => config('navigation'))
  ```
- Cache user roles/permissions if checking frequently:
  ```php
  Cache::tags(['user_' . auth()->id()])->remember(...)
  ```

### Production
- Run `php artisan config:cache` (config is immutable, no .env reads)
- Run `php artisan route:cache` (routes are immutable)
- Run `npm run build` (minify and fingerprint assets)

---

## Security

### CSRF Protection
- Built into Blade: `@csrf` token in all forms
- Middleware automatically validates

### Authentication
- Uses Laravel's built-in auth (Breeze scaffold)
- Sessions stored securely with `SESSION_DRIVER`
- Password hashing via bcrypt

### Authorization
- Optional middleware checks permissions
- Blade directive available: `@can('action')`
- Role-based access (HasRoles trait)

### Input Validation
- Always validate in controllers:
  ```php
  $validated = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users'
  ]);
  ```

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
