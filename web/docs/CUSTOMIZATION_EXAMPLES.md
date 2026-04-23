# LOGIFY — Customization Examples

Copy-paste examples for the six LOGIFY modules.

## Table of Contents

1. [Authentication — Customize Login Redirect](#1-authentication--customize-login-redirect)
2. [Dashboard — Add a Metric Card](#2-dashboard--add-a-metric-card)
3. [User Management — Extend User Fields](#3-user-management--extend-user-fields)
4. [Audit Trail — Log a Custom Action](#4-audit-trail--log-a-custom-action)
5. [Profile — Add a Profile Field](#5-profile--add-a-profile-field)
6. [2FA — Enforce 2FA for Admin Role](#6-2fa--enforce-2fa-for-admin-role)
7. [Navigation — Update Sidebar Items](#7-navigation--update-sidebar-items)
8. [Role-Based Route Protection](#8-role-based-route-protection)

---

## 1. Authentication — Customize Login Redirect

**File:** `app/Http/Controllers/Auth/AuthController.php`

By default, login redirects to `/dashboard`. To change the post-login destination:

```php
protected function authenticated(Request $request, $user): RedirectResponse
{
    // Redirect admins to user management, others to dashboard
    if ($user->hasRole('admin')) {
        return redirect()->route('users.index');
    }

    return redirect()->route('dashboard');
}
```

To customize failed login behavior (e.g., add a lockout message):

```php
protected function sendFailedLoginResponse(Request $request): void
{
    ActivityLog::create([
        'user_id'    => null,
        'action'     => 'Failed login attempt for: ' . $request->input('email'),
        'model_type' => 'Auth',
        'model_id'   => null,
        'ip_address' => $request->ip(),
    ]);

    throw ValidationException::withMessages([
        'email' => [trans('auth.failed')],
    ]);
}
```

---

## 2. Dashboard — Add a Metric Card

**File:** `app/Http/Controllers/DashboardController.php`

Add a new stat to the dashboard:

```php
private function dashboardData(): array
{
    try {
        $totalUsers   = User::count();
        $activeUsers  = User::where('active', true)->count();
        $newThisWeek  = User::where('created_at', '>=', now()->subDays(7))->count();
        $auditCount   = ActivityLog::whereDate('created_at', today())->count();

        $stats = [
            ['label' => 'Total Users',    'value' => $totalUsers,  'icon' => 'cil-people'],
            ['label' => 'Active Users',   'value' => $activeUsers, 'icon' => 'cil-user-follow'],
            ['label' => 'New This Week',  'value' => $newThisWeek, 'icon' => 'cil-user-plus'],
            ['label' => 'Events Today',   'value' => $auditCount,  'icon' => 'cil-list'],
        ];

        $recentActivity = ActivityLog::with('user:id,name')
            ->latest()
            ->limit(10)
            ->get()
            ->map(fn($log) => [
                'user'   => $log->user?->name ?? 'System',
                'action' => $log->action,
                'time'   => $log->created_at->diffForHumans(),
            ])
            ->all();

        return [$stats, $recentActivity];
    } catch (\Exception $e) {
        return [[], []];
    }
}
```

**File:** `resources/views/dashboard/index.blade.php` — add the card:

```blade
@foreach ($stats as $stat)
  <div class="col-sm-6 col-xl-3">
    <div class="card text-white bg-primary">
      <div class="card-body d-flex align-items-center p-3">
        <i class="{{ $stat['icon'] }} fs-3 me-3"></i>
        <div>
          <div class="fs-6 fw-semibold">{{ $stat['label'] }}</div>
          <div class="fs-4 fw-bold">{{ $stat['value'] }}</div>
        </div>
      </div>
    </div>
  </div>
@endforeach
```

---

## 3. User Management — Extend User Fields

### Add a `phone` field to users

**Step 1: Migration**

```bash
php artisan make:migration add_phone_to_users_table
```

```php
public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('phone')->nullable()->after('email');
    });
}
```

**Step 2: Mass-assign in model**

`app/Models/User.php`:

```php
protected $fillable = ['name', 'email', 'password', 'phone', 'active'];
```

**Step 3: Validation in controller**

`app/Http/Controllers/UserController.php`:

```php
$validated = $request->validate([
    'name'  => 'required|string|max:255',
    'email' => 'required|email|unique:users,email,' . $user->id,
    'phone' => 'nullable|string|max:20',
    'role'  => 'required|exists:roles,id',
]);
```

**Step 4: Add to form view**

`resources/views/users/edit.blade.php`:

```blade
<div class="mb-3">
  <label class="form-label">Phone</label>
  <input type="text" name="phone"
    class="form-control @error('phone') is-invalid @enderror"
    value="{{ old('phone', $user->phone) }}">
  @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
```

---

## 4. Audit Trail — Log a Custom Action

Call this anywhere in a controller after a significant operation:

```php
use App\Models\ActivityLog;

ActivityLog::create([
    'user_id'    => auth()->id(),
    'action'     => 'Deactivated user: ' . $user->email,
    'model_type' => 'User',
    'model_id'   => $user->id,
    'ip_address' => request()->ip(),
]);
```

### Extract to a helper method

`app/Http/Controllers/Controller.php` (base controller):

```php
protected function logActivity(string $action, string $modelType = null, int $modelId = null): void
{
    ActivityLog::create([
        'user_id'    => auth()->id(),
        'action'     => $action,
        'model_type' => $modelType,
        'model_id'   => $modelId,
        'ip_address' => request()->ip(),
    ]);
}
```

Usage in any controller that extends `Controller`:

```php
$this->logActivity('Created user: ' . $user->email, 'User', $user->id);
$this->logActivity('Enabled 2FA', 'User', auth()->id());
$this->logActivity('Updated profile name', 'User', auth()->id());
```

### Filter audit log by user

`app/Http/Controllers/AuditTrailController.php`:

```php
public function index(Request $request): View
{
    $query = ActivityLog::with('user:id,name')->latest();

    if ($request->filled('user_id')) {
        $query->where('user_id', $request->user_id);
    }

    if ($request->filled('date_from')) {
        $query->whereDate('created_at', '>=', $request->date_from);
    }

    if ($request->filled('date_to')) {
        $query->whereDate('created_at', '<=', $request->date_to);
    }

    return view('audit.index', [
        'logs'  => $query->paginate(25),
        'users' => User::select('id', 'name')->orderBy('name')->get(),
    ]);
}
```

---

## 5. Profile — Add a Profile Field

### Add a `bio` field

**Step 1: Migration**

```php
$table->text('bio')->nullable()->after('phone');
```

**Step 2: Controller update method**

`app/Http/Controllers/ProfileController.php`:

```php
public function update(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . auth()->id(),
        'bio'   => 'nullable|string|max:1000',
    ]);

    auth()->user()->update($validated);

    $this->logActivity('Updated profile');

    return redirect()->route('profile.show')->with('success', 'Profile updated.');
}
```

**Step 3: View**

```blade
<div class="mb-3">
  <label class="form-label">Bio</label>
  <textarea name="bio" class="form-control" rows="3">{{ old('bio', auth()->user()->bio) }}</textarea>
</div>
```

### Change password

```php
public function updatePassword(Request $request): RedirectResponse
{
    $request->validate([
        'current_password' => ['required', 'current_password'],
        'password'         => ['required', 'min:8', 'confirmed'],
    ]);

    auth()->user()->update([
        'password' => bcrypt($request->password),
    ]);

    $this->logActivity('Changed password');

    return redirect()->route('profile.show')->with('success', 'Password changed.');
}
```

---

## 6. 2FA — Enforce 2FA for Admin Role

Add middleware that forces admins to complete 2FA enrollment before accessing protected routes:

**File:** `app/Http/Middleware/RequireTwoFactor.php`

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequireTwoFactor
{
    public function handle(Request $request, Closure $next): mixed
    {
        $user = $request->user();

        if ($user && $user->hasRole('admin') && ! $user->two_factor_secret) {
            return redirect()->route('two-factor.setup')
                ->with('warning', 'Admin accounts must enable 2FA.');
        }

        return $next($request);
    }
}
```

Register and apply to admin routes:

```php
// bootstrap/app.php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias(['require2fa' => \App\Http\Middleware\RequireTwoFactor::class]);
})

// routes/web.php
Route::middleware(['auth', 'require2fa'])->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/audit', [AuditTrailController::class, 'index'])->name('audit.index');
});
```

---

## 7. Navigation — Update Sidebar Items

**File:** `config/navigation.php`

Current structure:

```php
return [
    ['type' => 'item',  'label' => 'Dashboard',  'route' => 'dashboard',   'icon' => 'cil-speedometer'],
    ['type' => 'title', 'label' => 'Management'],
    ['type' => 'item',  'label' => 'Users',       'route' => 'users.index', 'icon' => 'cil-people'],
    ['type' => 'item',  'label' => 'Audit Trail', 'route' => 'audit.index', 'icon' => 'cil-list'],
    ['type' => 'title', 'label' => 'Account'],
    ['type' => 'item',  'label' => 'Profile',     'route' => 'profile.show','icon' => 'cil-user'],
];
```

To show an item only for admins, filter in the sidebar component:

`resources/views/components/sidebar.blade.php`:

```blade
@foreach ($navItems as $item)
  @if (isset($item['admin_only']) && $item['admin_only'])
    @if (auth()->user()->hasRole('admin'))
      {{-- render item --}}
    @endif
  @else
    {{-- render item --}}
  @endif
@endforeach
```

And in `navigation.php`:

```php
['type' => 'item', 'label' => 'Users', 'route' => 'users.index', 'icon' => 'cil-people', 'admin_only' => true],
```

---

## 8. Role-Based Route Protection

### Apply to a single route

```php
Route::get('/users', [UserController::class, 'index'])
    ->middleware(['auth', 'permission:users.manage'])
    ->name('users.index');
```

### Apply to a group

```php
Route::middleware(['auth', 'permission:users.manage'])->group(function () {
    Route::resource('users', UserController::class);
    Route::post('/users/{user}/deactivate', [UserController::class, 'deactivate'])
         ->name('users.deactivate');
});
```

### Check in Blade

```blade
@if (auth()->user()->hasPermission('users.manage'))
  <a href="{{ route('users.create') }}" class="btn btn-primary">New User</a>
@endif
```

### Check in controller

```php
public function deactivate(User $user): RedirectResponse
{
    if (! auth()->user()->hasPermission('users.manage')) {
        abort(403);
    }

    $user->update(['active' => false]);
    $this->logActivity('Deactivated user: ' . $user->email, 'User', $user->id);

    return redirect()->back()->with('success', 'User deactivated.');
}
```

