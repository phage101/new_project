# Customization Examples

Copy-paste examples for common customization tasks.

## Table of Contents

1. [Add a Menu Item](#add-a-menu-item)
2. [Create a CRUD Module](#create-a-crud-module)
3. [Add Database Metrics to Dashboard](#add-database-metrics-to-dashboard)
4. [Create a Custom Chart](#create-a-custom-chart)
5. [Add a Form Page](#add-a-form-page)
6. [Log User Activity](#log-user-activity)
7. [Add Role-Based Route Protection](#add-role-based-route-protection)
8. [Customize Navigation Programmatically](#customize-navigation-programmatically)
9. [Add Custom Blade Component](#add-custom-blade-component)
10. [Add Email Notifications](#add-email-notifications)

---

## Add a Menu Item

**File:** `config/navigation.php`

Add this to the navigation array:

```php
[
    'type' => 'item',
    'label' => 'Reports',
    'route' => 'reports.index',
    'icon' => 'cil-bar-chart',
    'badge' => ['color' => 'success', 'text' => 'BETA'],
],
```

Or as a collapsible group:

```php
[
    'type' => 'group',
    'label' => 'Analytics',
    'icon' => 'cil-chart-pie',
    'items' => [
        ['label' => 'Revenue', 'route' => 'analytics.revenue'],
        ['label' => 'Users', 'route' => 'analytics.users'],
        ['label' => 'Traffic', 'route' => 'analytics.traffic'],
    ],
],
```

The menu will update automatically after page refresh.

---

## Create a CRUD Module

### Step 1: Generate Files

```bash
php artisan make:model Post -mrc
php artisan make:request StorePostRequest
php artisan make:request UpdatePostRequest
```

### Step 2: Define Migration

**File:** `database/migrations/YYYY_MM_DD_HHMMSS_create_posts_table.php`

```php
public function up(): void
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content');
        $table->string('slug')->unique();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->timestamps();
        $table->softDeletes();
    });
}
```

### Step 3: Define Routes

**File:** `routes/web.php`

```php
Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
});
```

### Step 4: Define Controller

**File:** `app/Http/Controllers/PostController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(15);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
        
        return redirect()->route('posts.show', $post)
            ->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        
        return redirect()->route('posts.show', $post)
            ->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
```

### Step 5: Create Views

**File:** `resources/views/posts/index.blade.php`

```blade
@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <span>Posts</span>
        <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary">New Post</a>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table mb-0">
        <thead>
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Created</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
            <tr>
              <td>{{ $post->title }}</td>
              <td>{{ $post->user->name }}</td>
              <td>{{ $post->created_at->format('M d, Y') }}</td>
              <td class="text-end">
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sure?')">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      {{ $posts->links() }}
    </div>
  </div>
@endsection
```

**File:** `resources/views/posts/create.blade.php`

```blade
@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Create Post</div>
    <div class="card-body">
      <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
          @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Content</label>
          <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="6">{{ old('content') }}</textarea>
          @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
  </div>
@endsection
```

### Step 6: Run Migration

```bash
php artisan migrate
```

---

## Add Database Metrics to Dashboard

**File:** `app/Http/Controllers/DashboardController.php`

Modify the `dashboardData()` method:

```php
private function dashboardData(): array
{
    try {
        $userCount = User::count();
        $postCount = Post::count();
        $commentCount = Comment::count();
        $revenueToday = Order::whereDate('created_at', now())->sum('amount');

        $stats = [
            ['label' => 'Users', 'value' => number_format($userCount), 'trend' => '+' . User::where('created_at', '>', now()->subDays(7))->count() . ' this week'],
            ['label' => 'Posts', 'value' => number_format($postCount), 'trend' => number_format($postCount / max($userCount, 1), 1) . ' per user'],
            ['label' => 'Comments', 'value' => number_format($commentCount), 'trend' => 'Total comments'],
            ['label' => 'Revenue', 'value' => '$' . number_format($revenueToday, 2), 'trend' => 'Today'],
        ];

        $recentActivity = ActivityLog::query()
            ->with('user:id,name')
            ->latest()
            ->limit(8)
            ->get()
            ->map(function (ActivityLog $log) {
                return [
                    'user' => $log->user?->name ?? 'System',
                    'action' => $log->action,
                    'time' => $log->created_at?->diffForHumans() ?? 'n/a',
                ];
            })
            ->all();

        return [$stats, $recentActivity];
    } catch (QueryException $exception) {
        // Fallback if migrations haven't run
        return [
            [
                ['label' => 'Users', 'value' => '0', 'trend' => 'Run migrations'],
                ['label' => 'Posts', 'value' => '0', 'trend' => 'php artisan migrate'],
                ['label' => 'Comments', 'value' => '0', 'trend' => 'No data yet'],
                ['label' => 'Revenue', 'value' => '$0.00', 'trend' => 'No data yet'],
            ],
            [['user' => 'System', 'action' => 'Database not yet initialized', 'time' => 'now']],
        ];
    }
}
```

---

## Create a Custom Chart

### Step 1: Add Canvas to View

**File:** `resources/views/dashboard/index.blade.php`

```blade
<div class="card">
  <div class="card-header">Sales This Month</div>
  <div class="card-body" style="height: 400px">
    <canvas id="sales-chart"></canvas>
  </div>
</div>
```

### Step 2: Initialize Chart in app.js

**File:** `resources/js/app.js`

```js
const salesChartElement = document.getElementById('sales-chart')
if (salesChartElement) {
  new Chart(salesChartElement, {
    type: 'bar',
    data: {
      labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
      datasets: [
        {
          label: 'Sales',
          data: [1200, 1900, 1500, 2200],
          backgroundColor: '#321fdb',
        },
        {
          label: 'Revenue',
          data: [5000, 7500, 6200, 9100],
          backgroundColor: '#39f',
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: { beginAtZero: true },
      },
    },
  })
}
```

### Step 3: Load Dynamic Data from Controller

**File:** `app/Http/Controllers/DashboardController.php`

```php
public function index(): View
{
    $chartData = [
        'labels' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        'sales' => Order::selectRaw('DAYOFWEEK(created_at) as day, COUNT(*) as count')
            ->whereDate('created_at', '>=', now()->subDays(7))
            ->groupBy('day')
            ->pluck('count', 'day')
            ->toArray(),
    ];

    return view('dashboard.index', [
        'chartData' => json_encode($chartData),
        // ...
    ]);
}
```

**File:** `resources/views/dashboard/index.blade.php`

```blade
@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const data = {!! $chartData !!}
      const ctx = document.getElementById('sales-chart')
      if (ctx) {
        new Chart(ctx, {
          type: 'line',
          data: {
            labels: data.labels,
            datasets: [{ label: 'Orders', data: data.sales }]
          }
        })
      }
    })
  </script>
@endpush
```

---

## Add a Form Page

**File:** `resources/views/profile/edit.blade.php`

```blade
@extends('layouts.app')

@section('content')
  <div class="row g-4">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">Edit Profile</div>
        <div class="card-body">
          <form action="{{ route('profile.update') }}" method="POST">
            @csrf

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', auth()->user()->first_name) }}">
                @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', auth()->user()->last_name) }}">
                @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', auth()->user()->email) }}">
              @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Bio</label>
              <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" rows="4">{{ old('bio', auth()->user()->bio) }}</textarea>
              @error('bio') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
```

---

## Log User Activity

**Any controller or model:**

```php
use App\Models\ActivityLog;

// Log an action
ActivityLog::create([
    'user_id' => auth()->id(),
    'action' => 'Created new post: "' . $post->title . '"',
    'model_type' => 'Post',
    'model_id' => $post->id,
    'ip_address' => request()->ip(),
    'meta' => [
        'user_agent' => request()->userAgent(),
        'referer' => request()->referer(),
    ],
]);

// Query recent activity
$recentActions = ActivityLog::with('user')
    ->where('model_type', 'Post')
    ->latest()
    ->limit(10)
    ->get();
```

---

## Add Role-Based Route Protection

### Step 1: Add Trait to User

**File:** `app/Models/User.php`

```php
use App\Models\Concerns\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
}
```

### Step 2: Register Middleware (Laravel 11)

**File:** `bootstrap/app.php`

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'permission' => \App\Http\Middleware\EnsureUserHasPermission::class,
    ]);
})
```

### Step 3: Protect Routes

**File:** `routes/web.php`

```php
Route::get('/admin/users', [UserController::class, 'index'])
    ->middleware(['auth', 'permission:users.manage']);

Route::post('/admin/settings', [SettingController::class, 'update'])
    ->middleware(['auth', 'permission:settings.manage']);
```

### Step 4: Check in Blade

```blade
@if(auth()->user()?->hasPermission('users.manage'))
  <a href="{{ route('users.index') }}">Manage Users</a>
@endif
```

---

## Customize Navigation Programmatically

**File:** `config/navigation.php`

```php
<?php

$nav = [
    ['type' => 'item', 'label' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'cil-speedometer'],
];

// Add admin section only for admins
if (auth()->check() && auth()->user()->hasRole('admin')) {
    $nav[] = [
        'type' => 'group',
        'label' => 'Administration',
        'icon' => 'cil-settings',
        'items' => [
            ['label' => 'Users', 'route' => 'users.index'],
            ['label' => 'Roles', 'route' => 'roles.index'],
            ['label' => 'Settings', 'route' => 'settings.index'],
        ],
    ];
}

return $nav;
```

---

## Add Custom Blade Component

### Step 1: Create Component

```bash
php artisan make:component Alert
```

**File:** `app/View/Components/Alert.php`

```php
<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public function __construct(
        public string $type = 'info',
        public string $message = '',
    ) {}

    public function render()
    {
        return view('components.alert');
    }
}
```

### Step 2: Create Template

**File:** `resources/views/components/alert.blade.php`

```blade
<div class="alert alert-{{ $type }}" role="alert">
  {{ $message }}
</div>
```

### Step 3: Use in Views

```blade
<x-alert type="success" message="Operation completed!" />

<!-- Or with slot -->
<x-alert type="warning">
  Please verify your information
</x-alert>
```

---

## Add Email Notifications

### Step 1: Create Mailable

```bash
php artisan make:mail PostPublished
```

**File:** `app/Mail/PostPublished.php`

```php
<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Mail\Mailable;

class PostPublished extends Mailable
{
    public function __construct(public Post $post) {}

    public function envelope()
    {
        return new Envelope(subject: 'New Post: ' . $this->post->title);
    }

    public function content()
    {
        return new Content(view: 'emails.post-published');
    }
}
```

### Step 2: Create Email Template

**File:** `resources/views/emails/post-published.blade.php`

```blade
<h1>{{ $post->title }}</h1>
<p>{{ $post->excerpt }}</p>
<a href="{{ route('posts.show', $post) }}">Read Post</a>
```

### Step 3: Send Email

**File:** `app/Http/Controllers/PostController.php`

```php
use App\Mail\PostPublished;
use Illuminate\Support\Facades\Mail;

public function store(StorePostRequest $request)
{
    $post = Post::create($request->validated());
    
    Mail::to(auth()->user())->send(new PostPublished($post));
    
    return redirect()->route('posts.show', $post);
}
```

---

For more patterns, see [ARCHITECTURE.md](ARCHITECTURE.md) and [README.md](README.md).
