# CoreUI + Laravel Integration Starter

A production-ready Laravel 11 + CoreUI 5 admin template scaffold with Blade layouts, RBAC foundations, and MySQL database wiring.

## What's Included

### Frontend
- **CoreUI CSS Framework**: Bootstrap-based responsive design system
- **Blade Components**: Reusable sidebar, header, footer, breadcrumb layouts
- **Vite Asset Pipeline**: Modern bundling with SCSS and Chart.js support
- **Theme Switcher**: Light/Dark/Auto mode persistence via localStorage
- **40+ Pre-wired Routes**: All CoreUI demo sections mapped to Laravel routes

### Backend
- **Authentication**: Laravel Breeze (Blade variant) for user management
- **RBAC Scaffold**: Role, Permission models with many-to-many relationships
- **Activity Logging**: Audit trail table for user actions
- **Settings System**: Global and user-scoped configuration storage
- **Safe Dashboard**: DB-backed metrics with graceful fallback if migrations pending

### Database
- **Roles Table**: admin, manager, editor, viewer roles (customizable)
- **Permissions Table**: Action-based permissions linked to roles
- **Activity Logs**: Audit events with user, model type, and timestamps
- **Settings**: Global config key-value pairs
- **Default Users**: Uses Laravel's `users` table from Breeze

## Quick Start

### Prerequisites
- PHP 8.2+
- Composer
- Node.js 18+ and npm
- MySQL 8.0+

### Installation

1. **Clone or copy the starter files into your Laravel project:**
   ```bash
   cp -r laravel_coreui_starter/* your-laravel-app/
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install Node dependencies:**
   ```bash
   npm install
   ```

4. **Set up environment:**
   ```bash
   cp .env.example .env
   ```
   Edit `.env` and configure:
   - `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` for MySQL
   - `APP_URL` for your local/production domain

5. **Generate app key:**
   ```bash
   php artisan key:generate
   ```

6. **Run migrations:**
   ```bash
   php artisan migrate
   ```

7. **Seed roles/permissions/settings:**
   ```bash
   php artisan db:seed
   ```

8. **Build assets:**
   ```bash
   npm run build
   ```

9. **Start development server:**
   ```bash
   php artisan serve
   npm run dev  # In another terminal for asset watching
   ```

10. **Create a test user:**
    ```bash
    php artisan tinker
    > \App\Models\User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password')])
    > exit()
    ```

11. **Login:** Visit http://localhost:8000, login with your credentials, and explore the dashboard.

## Architecture Overview

```
laravel_coreui_starter/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── DashboardController.php      # DB-backed dashboard stats
│   │   │   ├── PageController.php           # Generic route handler
│   │   │   └── [Your custom controllers]
│   │   └── Middleware/
│   │       └── EnsureUserHasPermission.php  # Optional RBAC enforcement
│   ├── Models/
│   │   ├── User.php                          # (Has HasRoles trait available)
│   │   ├── Role.php
│   │   ├── Permission.php
│   │   ├── ActivityLog.php
│   │   ├── Setting.php
│   │   └── Concerns/
│   │       └── HasRoles.php                 # Reusable RBAC trait
│   └── ...
├── config/
│   └── navigation.php                       # Sidebar menu structure
├── database/
│   ├── migrations/
│   │   ├── roles, permissions, settings     # Application schema
│   │   └── (Laravel's default auth tables)
│   └── seeders/
│       ├── RoleSeeder.php                   # Bootstrap roles
│       ├── PermissionSeeder.php             # Bootstrap permissions
│       ├── SettingSeeder.php                # Bootstrap app settings
│       └── DatabaseSeeder.php               # Master seeder
├── resources/
│   ├── js/
│   │   └── app.js                           # Vite entry: CoreUI + Chart.js init
│   ├── scss/
│   │   └── app.scss                         # CoreUI SCSS + overrides
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php                # Main authenticated layout
│       │   └── auth.blade.php               # Login/register layout
│       ├── components/
│       │   ├── sidebar.blade.php
│       │   ├── header.blade.php
│       │   ├── footer.blade.php
│       │   ├── breadcrumb.blade.php
│       │   └── section-page.blade.php       # Scaffold template
│       ├── dashboard/
│       │   └── index.blade.php              # Metrics + activity feed
│       ├── auth/
│       │   ├── login.blade.php              # CoreUI-styled forms
│       │   └── register.blade.php
│       ├── errors/
│       │   ├── 404.blade.php
│       │   └── 500.blade.php
│       └── pages/
│           ├── theme/
│           ├── base/                        # 16 component showcase pages
│           ├── buttons/                     # 3 component pages
│           ├── forms/                       # 8 form pattern pages
│           ├── icons/
│           ├── notifications/               # 4 notification UX pages
│           ├── charts/
│           └── widgets/
├── routes/
│   └── web.php                              # All 40+ routes wired
├── vite.config.js                           # Vite + Laravel plugin
├── package.json                             # Node dependencies
└── .env.example                             # Environment template
```

## Key Files and Customization

### Navigation Menu
**File:** [config/navigation.php](config/navigation.php)

The sidebar menu is driven by a PHP array. Modify to add/remove/reorder items:
```php
[
    'type' => 'item',
    'label' => 'Dashboard',
    'route' => 'dashboard',
    'icon' => 'cil-speedometer',
    'badge' => ['color' => 'info', 'text' => 'NEW'],
],
```

Types: `'item'` (link), `'group'` (collapsible), `'title'` (section header).

### Routes
**File:** [routes/web.php](routes/web.php)

All public/auth routes are defined here. Add your own routes using standard Laravel patterns:
```php
Route::get('/custom-page', [YourController::class, 'show'])->name('custom.show');
```

### Dashboard
**File:** [app/Http/Controllers/DashboardController.php](app/Http/Controllers/DashboardController.php)

Modify the `dashboardData()` method to query your own metrics:
```php
$userCount = User::count();
$revenueToday = Order::whereDate('created_at', today())->sum('amount');
// ... add to $stats array
```

### RBAC (Optional)

To enable role-based access control:

1. **Add trait to User model:**
   ```php
   use App\Models\Concerns\HasRoles;

   class User extends Authenticatable {
       use HasRoles;
   }
   ```

2. **Use middleware on routes:**
   ```php
   Route::get('/admin/users', [UserController::class, 'index'])
       ->middleware('auth')
       ->middleware('permission:users.manage');
   ```

3. **Check permissions in Blade:**
   ```blade
   @if(auth()->user()->hasPermission('users.manage'))
       <a href="{{ route('users.index') }}">Manage Users</a>
   @endif
   ```

### Forms
**Directory:** [resources/views/pages/forms/](resources/views/pages/forms/)

Each file demonstrates a form pattern. Copy and adapt for your CRUD pages:
- `form-control.blade.php` → Text inputs, sizes, states
- `checks-radios.blade.php` → Toggles, switches, radio groups
- `select.blade.php` → Dropdowns, datalists
- `validation.blade.php` → Valid/invalid field feedback
- `layout.blade.php` → Multi-column grid form structure

### Notifications
**Directory:** [resources/views/pages/notifications/](resources/views/pages/notifications/)

UX patterns for alerts, badges, modals, and toasts. Use in your views:
```blade
<div class="alert alert-success">Operation completed!</div>
<button class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#confirmModal">
  Confirm Action
</button>
```

## Adding Features

### Add a New Page Section

1. Create route in `routes/web.php`:
   ```php
   Route::get('/users', [UserController::class, 'index'])->name('users.index');
   ```

2. Create view in `resources/views/users/index.blade.php`:
   ```blade
   @extends('layouts.app')
   @section('content')
     <div class="card">
       <div class="card-header">Users</div>
       <div class="card-body">
         {{-- Your content --}}
       </div>
     </div>
   @endsection
   ```

3. Add menu item in `config/navigation.php`:
   ```php
   ['type' => 'item', 'label' => 'Users', 'route' => 'users.index', 'icon' => 'cil-user'],
   ```

### Add Activity Logging

Anywhere in your code, log an action:
```php
use App\Models\ActivityLog;

ActivityLog::create([
    'user_id' => auth()->id(),
    'action' => 'Created order #1234',
    'model_type' => 'Order',
    'model_id' => 1234,
    'ip_address' => request()->ip(),
]);
```

The dashboard automatically displays recent logs.

### Use Chart.js in Custom Pages

Charts are initialized in `resources/js/app.js`. Add a canvas and the script will detect it:
```blade
<div class="card">
  <canvas id="my-custom-chart"></canvas>
</div>

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const ctx = document.getElementById('my-custom-chart')
      if (ctx) {
        new window.Chart(ctx, {
          type: 'pie',
          data: { labels: [...], datasets: [...] },
          options: { responsive: true, maintainAspectRatio: false }
        })
      }
    })
  </script>
@endpush
```

Or import Chart directly in the app.js module for fully custom charts.

## Theming

### Colors and Styles

Customize CoreUI in [resources/scss/app.scss](resources/scss/app.scss):
```scss
$primary: #0066cc;
$success: #28a745;
// ... override any CoreUI variables before @use
```

### Dark Mode

Users can toggle dark mode via the header theme switcher. Persistence is handled by localStorage and CoreUI's built-in theming. No custom code needed.

## Testing

Run tests (scaffolded by Breeze):
```bash
php artisan test
```

The starter does not include test fixtures by default—add tests for your custom routes and models.

## Deployment

1. **Build assets for production:**
   ```bash
   npm run build
   ```

2. **Run migrations on production:**
   ```bash
   php artisan migrate --force
   ```

3. **Seed initial roles/permissions (if needed):**
   ```bash
   php artisan db:seed --class=RoleSeeder
   php artisan db:seed --class=PermissionSeeder
   ```

4. **Configure .env** with production database, mail, and domain settings.

5. **Cache config for performance:**
   ```bash
   php artisan config:cache
   php artisan route:cache
   ```

## Troubleshooting

**Routes return 404:**
- Ensure `php artisan serve` is running.
- Check `routes/web.php` for the route definition.

**Dashboard shows "Run migrations":**
- Run `php artisan migrate` to create tables.

**Charts not rendering:**
- Open browser console for JS errors.
- Ensure `npm run dev` or `npm run build` has completed.

**Theme switcher not working:**
- Ensure JavaScript is enabled and `resources/js/app.js` is loaded.
- Check browser console for errors.

**Permissions not enforcing:**
- Add `HasRoles` trait to User model.
- Register middleware alias in `app/Http/Kernel.php` (Laravel 11).
- Use `->middleware('permission:slug')` on routes.

## Next Steps

1. **Replace placeholder pages** in `resources/views/pages/` with your business logic.
2. **Create Eloquent models** for your data (e.g., `User`, `Order`, `Product`).
3. **Add API routes** if building a backend for a frontend framework.
4. **Set up email** with Laravel Mail for notifications.
5. **Add form validation** and custom request classes.
6. **Implement full RBAC** by registering middleware and adding checks to controllers.
7. **Add tests** for critical flows.
8. **Deploy** to production with proper environment configuration.

## Support & Resources

- [CoreUI Blade Docs](https://coreui.io/bootstrap/) – CSS framework reference
- [Laravel Documentation](https://laravel.com/docs) – Framework guide
- [Laravel Vite Plugin](https://github.com/laravel/vite-plugin) – Asset bundling
- [Breeze Documentation](https://laravel.com/docs/breeze) – Authentication scaffolding

## License

This starter is MIT-licensed. CoreUI is MIT. Laravel is MIT.
