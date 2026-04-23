# CoreUI + Laravel Starter — Setup Guide

This guide walks you through setting up the CoreUI + Laravel admin template starter on your machine.

## Prerequisites

Ensure you have the following installed:

- **PHP 8.2 or higher** ([Download](https://www.php.net/downloads.php))
  - Verify: `php -v`
- **Composer** ([Download](https://getcomposer.org/download/))
  - Verify: `composer --version`
- **Node.js 20.19+ (or 22.12+) and npm** ([Download](https://nodejs.org/))
  - Verify: `node -v && npm -v`
- **MySQL 8.0 or higher** ([Download](https://www.mysql.com/downloads/))
  - Verify: `mysql --version`
  - Or use MariaDB, PostgreSQL (update `.env` as needed)

---

## Step-by-Step Installation

### 1. Copy Starter Files

Replace the `laravel_coreui_starter` folder into your main Laravel project, or copy individual files if integrating into an existing app:

```bash
# Option A: New Laravel project with starter
cp -r laravel_coreui_starter ~/projects/my-admin-app
cd ~/projects/my-admin-app

# Option B: Integrate into existing Laravel app
cp -r laravel_coreui_starter/* ~/existing-laravel-app/
```

### 2. Install Dependencies

**PHP packages:**
```bash
composer install
```

**Node packages:**
```bash
npm install
```

### 3. Configure Environment

Copy the example environment file:
```bash
cp .env.example .env
```

Edit `.env` with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=coreui_laravel   # Create this database first
DB_USERNAME=root
DB_PASSWORD=your_password
```

Create the MySQL database if not already present:
```sql
CREATE DATABASE coreui_laravel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

This creates a unique encryption key for your app and sets `APP_KEY` in `.env`.

### 5. Run Database Migrations

```bash
php artisan migrate
```

This creates all necessary tables including `users`, `roles`, `permissions`, `settings`, and `activity_logs`.

### 6. Seed Initial Data

```bash
php artisan db:seed
```

This populates:
- **Roles:** Administrator, Manager, Editor, Viewer
- **Permissions:** Dashboard view, Users manage, Roles manage, Settings manage
- **Settings:** App name, default theme, timezone

### 7. Build Frontend Assets

```bash
npm run build
```

This compiles SCSS and JavaScript into `public/build/` for production use. During development, run:
```bash
npm run dev
```

### 8. Create a Test User (Optional)

Use Tinker to quickly create a user:

```bash
php artisan tinker
> \App\Models\User::create(['name' => 'Admin User', 'email' => 'admin@example.com', 'password' => bcrypt('password123')])
> exit()
```

Or use Laravel Breeze's built-in register form at `/register` after starting the server.

### 9. Start the Development Server

In one terminal:
```bash
php artisan serve
```

In another terminal (for live asset recompilation):
```bash
npm run dev
```

### 10. Access the Application

Open your browser and visit:
```
http://localhost:8000
```

**Login** with the credentials you created:
- Email: `admin@example.com`
- Password: `password123`

---

## Post-Installation Checklist

- [ ] Database migrations completed without errors
- [ ] User can login successfully
- [ ] Dashboard loads with stats (Users, Roles, Activity Logs, Today Events)
- [ ] Sidebar navigation appears and is clickable
- [ ] Theme switcher (Light/Dark/Auto) in header works
- [ ] Form pages display correctly
- [ ] No JavaScript errors in browser console

---

## Common Issues and Solutions

### Issue: "SQLSTATE[HY000]: General error: 1030 Got error"

**Solution:** Ensure MySQL service is running:
```bash
# macOS
brew services start mysql

# Windows (if installed via Installer)
net start MySQL80

# Linux
sudo systemctl start mysql
```

### Issue: "Class 'PDO' not found"

**Solution:** PHP extensions missing. Enable them in `php.ini`:
```ini
extension=pdo_mysql
extension=mysqli
```

### Issue: Vite asset 404 errors after `npm run build`

**Solution:** Clear Laravel's cache and rebuild:
```bash
php artisan view:clear
npm run build
```

### Issue: "Class does not exist" after adding new files

**Solution:** Dump Composer autoloader:
```bash
composer dump-autoload
```

### Issue: Cannot login / "Unauthorized"

**Solution:**
1. Verify user exists: `php artisan tinker` → `\App\Models\User::first()`
2. Check `.env` APP_KEY is set: `php artisan key:generate`
3. Clear sessions: `php artisan cache:clear`

### Issue: Charts not rendering

**Solution:**
1. Ensure `npm run build` or `npm run dev` completed
2. Check browser console for JS errors (F12)
3. Verify `<canvas id="main-chart">` exists in view

### Issue: "The storage path is not writable"

**Solution:** Fix permissions:
```bash
chmod -R 775 storage bootstrap/cache
```

---

## Development Workflow

### Adding a New Admin Page

1. **Create a route** in `routes/web.php`:
   ```php
   Route::get('/products', [ProductController::class, 'index'])->name('products.index');
   ```

2. **Create a controller**:
   ```bash
   php artisan make:controller ProductController
   ```

3. **Create a Blade view** in `resources/views/products/index.blade.php`:
   ```blade
   @extends('layouts.app')
   @section('content')
     <div class="card">
       <div class="card-header">Products</div>
       <div class="card-body">
         {{-- Your content --}}
       </div>
     </div>
   @endsection
   ```

4. **Add menu item** in `config/navigation.php`:
   ```php
   ['type' => 'item', 'label' => 'Products', 'route' => 'products.index', 'icon' => 'cil-bag'],
   ```

5. **Refresh** and the menu item will appear automatically.

### Watching Assets During Development

Keep this command running in a separate terminal:
```bash
npm run dev
```

This watches for changes to SCSS and JS files and recompiles them automatically.

### Clearing Caches

If something seems stale:
```bash
php artisan cache:clear
php artisan view:clear
php artisan config:clear
composer dump-autoload
```

---

## Enabling RBAC (Role-Based Access Control)

If you want to enforce role-based permissions:

### 1. Add Trait to User Model

Edit `app/Models/User.php`:
```php
use App\Models\Concerns\HasRoles;

class User extends Authenticatable {
    use HasRoles;
    // ...
}
```

### 2. Register Middleware (Laravel 11)

Edit `bootstrap/app.php`:
```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'permission' => \App\Http\Middleware\EnsureUserHasPermission::class,
    ]);
})
```

### 3. Protect Routes

In `routes/web.php`:
```php
Route::get('/admin/users', [UserController::class, 'index'])
    ->middleware(['auth', 'permission:users.manage']);
```

### 4. Check in Blade

```blade
@if(auth()->user()?->hasPermission('users.manage'))
    <a href="{{ route('users.index') }}">Manage Users</a>
@endif
```

---

## Deployment

### Production Build

```bash
npm run build
php artisan migrate --force
php artisan db:seed --class=RoleSeeder
```

### Optimize for Production

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Environment Setup

Update `.env` for production:
```env
APP_DEBUG=false
APP_ENV=production
DB_HOST=your-production-db-host
MAIL_MAILER=smtp
# ... other production settings
```

---

## File Structure Reference

```
laravel_coreui_starter/
├── app/
│   ├── Http/Controllers/      # Your route handlers
│   ├── Models/                # Database models
│   └── ...
├── config/
│   └── navigation.php         # Sidebar menu
├── database/
│   ├── migrations/            # Schema files
│   └── seeders/               # Initial data
├── resources/
│   ├── js/                    # JavaScript (Chart.js, theme)
│   ├── scss/                  # Styles (CoreUI + custom)
│   └── views/                 # Blade templates
├── routes/
│   └── web.php                # All routes
├── public/
│   ├── build/                 # Compiled assets (generated)
│   └── images/avatars/        # Static images
├── .env.example               # Environment template
├── vite.config.js             # Asset bundler config
├── package.json               # Node dependencies
└── README.md                  # Project documentation
```

---

## Next Steps

1. **Explore the dashboard** — view metrics, recent activity
2. **Navigate sections** — browse forms, buttons, notifications, icons examples
3. **Customize navigation** — edit `config/navigation.php`
4. **Add your pages** — create new routes and Blade views
5. **Connect to your database** — create models, migrations, seeders
6. **Enable RBAC** (if needed) — follow the RBAC section above
7. **Deploy** — follow the Deployment section above

## Need Help?

- **Laravel docs:** https://laravel.com/docs
- **CoreUI CSS docs:** https://coreui.io/bootstrap/
- **Vite docs:** https://vitejs.dev/

Good luck! 🚀
