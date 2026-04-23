# LOGIFY — Setup Guide

This guide walks you through setting up LOGIFY on your machine. LOGIFY is a Laravel 11 + CoreUI admin panel with six modules: Authentication, Dashboard, User Management, Audit Trail, Profile, and Two-Factor Authentication.

## Current State

Verified on: 2026-04-23

- Application stack: Laravel 11 + Blade + CoreUI
- Asset pipeline: Vite
- Default app URL: `http://localhost:8000`
- Database expectation: MySQL-compatible database
- Docker status: Docker docs are aligned to a two-service setup (`app`, `web`) with external DB

Use this guide for native/local setup. For Docker-based setup and operations, use `DOCKER.md` and `docs/DOCKER_QUICK_REFERENCE.md`.

## Setup Path Selection

- Choose Native Setup if you run PHP, Composer, Node, and MySQL directly on your machine.
- Choose Docker Setup if you run the app in containers and connect to an external DB.
- Do not mix workflows in the same shell session unless you intentionally understand both environments.

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

### 1. Clone and Enter the Project

```bash
cd web/
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
> \App\Models\User::create(['name' => 'Admin User', 'email' => 'admin@example.com', 'password' => bcrypt('password')])
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
- Password: `password`

---

## Post-Installation Checklist

- [ ] Database migrations completed without errors
- [ ] Seeders ran (Roles, Permissions, Settings)
- [ ] Test user created and login succeeds
- [ ] Dashboard loads with user count and recent activity
- [ ] Sidebar shows: Dashboard, Users, Audit Trail, Profile
- [ ] User Management: can list, create, edit, deactivate users
- [ ] Audit Trail: log entries appear after actions
- [ ] Profile: can view and edit own profile
- [ ] 2FA: can enable and disable from Profile page
- [ ] No JavaScript errors in browser console

## Verification Checklist (Maintained)

Update this section when setup behavior or prerequisites change.

### Native Workflow Verification

- [ ] `composer install` succeeds
- [ ] `npm install` succeeds
- [ ] `php artisan key:generate` succeeds
- [ ] `php artisan migrate` succeeds
- [ ] `php artisan db:seed` succeeds
- [ ] `php artisan serve` starts successfully
- [ ] `npm run dev` starts successfully
- [ ] Login and dashboard render without errors

### Docker Workflow Verification

- [ ] `docker compose up -d` starts app and web services
- [ ] `docker compose exec app php artisan migrate` succeeds
- [ ] `http://localhost:8000` is reachable
- [ ] DB connectivity from container is confirmed

## Platform Command Matrix

### Open App URL

- Windows PowerShell: `Start-Process http://localhost:8000`
- macOS: `open http://localhost:8000`
- Linux: `xdg-open http://localhost:8000`

### Typical Path Copy Command

- Windows PowerShell: `Copy-Item .env.example .env`
- macOS/Linux: `cp .env.example .env`

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

### Issue: "The storage path is not writable"

**Solution:** Fix permissions:
```bash
chmod -R 775 storage bootstrap/cache
```

---

## Development Workflow

### Module Files by Feature

| Module | Controller | Views |
|--------|-----------|-------|
| Authentication | `Auth/AuthController.php` | `auth/login.blade.php` |
| Dashboard | `DashboardController.php` | `dashboard/index.blade.php` |
| User Management | `UserController.php` | `users/*.blade.php` |
| Audit Trail | `AuditTrailController.php` | `audit/index.blade.php` |
| Profile | `ProfileController.php` | `profile/*.blade.php` |
| 2FA | `TwoFactorController.php` | `auth/two-factor.blade.php` |

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

## RBAC (Role-Based Access Control)

RBAC is **required** for User Management and Audit Trail. It is not optional.

`HasRoles` trait is applied to `User` model. The `EnsureUserHasPermission` middleware is registered and used on protected routes.

Seeded permissions:
- `users.manage` — User Management (create, edit, deactivate)
- `audit.view` — Audit Trail viewer
- `profile.edit` — Profile editing (own profile)

Seeded roles and their permissions:

| Role | users.manage | audit.view | profile.edit |
|------|-------------|-----------|-------------|
| Administrator | ✓ | ✓ | ✓ |
| Manager | | ✓ | ✓ |
| Viewer | | ✓ | ✓ |

To check permissions in Blade:
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
