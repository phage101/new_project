<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Health check endpoint for Docker/load balancers
Route::get('/health', fn() => response()->json(['status' => 'ok'], 200));

Route::redirect('/', '/dashboard');

Route::view('/404', 'errors.404')->name('errors.404');
Route::view('/500', 'errors.500')->name('errors.500');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    Route::get('/audit', [AuditController::class, 'index'])
        ->middleware('permission:audit.view')
        ->name('audit.index');

    // User Management
    Route::middleware('permission:users.manage')->prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit')->withTrashed();
        Route::put('/{user}', [UserController::class, 'update'])->name('update')->withTrashed();
        Route::post('/{user}/deactivate', [UserController::class, 'deactivate'])->name('deactivate')->withTrashed();
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy')->withTrashed();
        Route::post('/{id}/restore', [UserController::class, 'restore'])->name('restore');
    });

    Route::get('/theme/colors', [PageController::class, 'show'])->defaults('section', 'theme')->defaults('page', 'colors')->name('theme.colors');
    Route::get('/theme/typography', [PageController::class, 'show'])->defaults('section', 'theme')->defaults('page', 'typography')->name('theme.typography');

    Route::get('/base/accordion', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'accordion')->name('base.accordion');
    Route::get('/base/breadcrumbs', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'breadcrumbs')->name('base.breadcrumbs');
    Route::get('/base/cards', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'cards')->name('base.cards');
    Route::get('/base/carousels', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'carousels')->name('base.carousels');
    Route::get('/base/chip', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'chip')->name('base.chip');
    Route::get('/base/collapses', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'collapses')->name('base.collapses');
    Route::get('/base/list-groups', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'list-groups')->name('base.list-groups');
    Route::get('/base/navs', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'navs')->name('base.navs');
    Route::get('/base/paginations', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'paginations')->name('base.paginations');
    Route::get('/base/placeholders', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'placeholders')->name('base.placeholders');
    Route::get('/base/popovers', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'popovers')->name('base.popovers');
    Route::get('/base/progress', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'progress')->name('base.progress');
    Route::get('/base/spinners', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'spinners')->name('base.spinners');
    Route::get('/base/tabs', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'tabs')->name('base.tabs');
    Route::get('/base/tables', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'tables')->name('base.tables');
    Route::get('/base/tooltips', [PageController::class, 'show'])->defaults('section', 'base')->defaults('page', 'tooltips')->name('base.tooltips');

    Route::get('/buttons/buttons', [PageController::class, 'show'])->defaults('section', 'buttons')->defaults('page', 'buttons')->name('buttons.buttons');
    Route::get('/buttons/button-groups', [PageController::class, 'show'])->defaults('section', 'buttons')->defaults('page', 'button-groups')->name('buttons.button-groups');
    Route::get('/buttons/dropdowns', [PageController::class, 'show'])->defaults('section', 'buttons')->defaults('page', 'dropdowns')->name('buttons.dropdowns');

    Route::get('/forms/checks-radios', [PageController::class, 'show'])->defaults('section', 'forms')->defaults('page', 'checks-radios')->name('forms.checks-radios');
    Route::get('/forms/chip-input', [PageController::class, 'show'])->defaults('section', 'forms')->defaults('page', 'chip-input')->name('forms.chip-input');
    Route::get('/forms/floating-labels', [PageController::class, 'show'])->defaults('section', 'forms')->defaults('page', 'floating-labels')->name('forms.floating-labels');
    Route::get('/forms/form-control', [PageController::class, 'show'])->defaults('section', 'forms')->defaults('page', 'form-control')->name('forms.form-control');
    Route::get('/forms/input-group', [PageController::class, 'show'])->defaults('section', 'forms')->defaults('page', 'input-group')->name('forms.input-group');
    Route::get('/forms/range', [PageController::class, 'show'])->defaults('section', 'forms')->defaults('page', 'range')->name('forms.range');
    Route::get('/forms/select', [PageController::class, 'show'])->defaults('section', 'forms')->defaults('page', 'select')->name('forms.select');
    Route::get('/forms/layout', [PageController::class, 'show'])->defaults('section', 'forms')->defaults('page', 'layout')->name('forms.layout');
    Route::get('/forms/validation', [PageController::class, 'show'])->defaults('section', 'forms')->defaults('page', 'validation')->name('forms.validation');

    Route::get('/charts', [PageController::class, 'show'])->defaults('section', 'charts')->defaults('page', 'index')->name('charts.index');

    Route::get('/icons/coreui-icons', [PageController::class, 'show'])->defaults('section', 'icons')->defaults('page', 'coreui-icons')->name('icons.coreui-icons');
    Route::get('/icons/flags', [PageController::class, 'show'])->defaults('section', 'icons')->defaults('page', 'flags')->name('icons.flags');
    Route::get('/icons/brands', [PageController::class, 'show'])->defaults('section', 'icons')->defaults('page', 'brands')->name('icons.brands');

    Route::get('/notifications/alerts', [PageController::class, 'show'])->defaults('section', 'notifications')->defaults('page', 'alerts')->name('notifications.alerts');
    Route::get('/notifications/badges', [PageController::class, 'show'])->defaults('section', 'notifications')->defaults('page', 'badges')->name('notifications.badges');
    Route::get('/notifications/modals', [PageController::class, 'show'])->defaults('section', 'notifications')->defaults('page', 'modals')->name('notifications.modals');
    Route::get('/notifications/toasts', [PageController::class, 'show'])->defaults('section', 'notifications')->defaults('page', 'toasts')->name('notifications.toasts');

    Route::get('/widgets', [PageController::class, 'show'])->defaults('section', 'widgets')->defaults('page', 'index')->name('widgets.index');
});

if (file_exists(__DIR__ . '/auth.php')) {
    require __DIR__ . '/auth.php';
}
