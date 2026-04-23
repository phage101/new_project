<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\View\View;

/**
 * Dashboard Controller
 *
 * Handles the main dashboard view with metrics and recent activity.
 *
 * To customize:
 * 1. Add your own metric queries in dashboardData()
 * 2. Use ActivityLog::create() to log user actions throughout your app
 * 3. Modify stat labels and trends to match your business metrics
 * 4. Replace hardcoded activity with real data queries
 */
class DashboardController extends Controller
{
    /**
     * Display the dashboard with metrics and recent activity.
     *
     * Gracefully handles pre-migration state by showing placeholder data.
     *
     * @return View
     */
    public function index(): View
    {
        [$stats, $recentActivity] = $this->dashboardData();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'breadcrumbs' => [
                ['label' => 'Dashboard', 'active' => true],
            ],
            'stats' => $stats,
            'recentActivity' => $recentActivity,
        ]);
    }

    /**
     * Fetch dashboard metrics from the database.
     *
     * This method queries the database for real metrics.
     * If migrations haven't run yet, it returns placeholder data.
     *
     * Customize this method to:
     * - Query your own models for metrics (e.g., Order revenue, User growth)
     * - Add/remove stat cards
     * - Change activity log query to filter specific actions
     *
     * Example:
     * $revenueToday = Order::whereDate('created_at', now())->sum('amount');
     * $topProduct = Product::withCount('orders')->orderByDesc('orders_count')->first();
     *
     * @return array [$stats, $recentActivity]
     */
    private function dashboardData(): array
    {
        try {
            $userCount = User::count();
            $roleCount = Role::count();
            $logCount = ActivityLog::count();
            $activeToday = ActivityLog::whereDate('created_at', now()->toDateString())->count();

            $stats = [
                ['label' => 'Users', 'value' => number_format($userCount), 'trend' => 'Live data'],
                ['label' => 'Roles', 'value' => number_format($roleCount), 'trend' => 'RBAC enabled'],
                ['label' => 'Activity Logs', 'value' => number_format($logCount), 'trend' => 'Audit stream'],
                ['label' => 'Today Events', 'value' => number_format($activeToday), 'trend' => 'Daily metric'],
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
            return [
                [
                    ['label' => 'Users', 'value' => '0', 'trend' => 'Run migrations'],
                    ['label' => 'Roles', 'value' => '0', 'trend' => 'Seed roles'],
                    ['label' => 'Activity Logs', 'value' => '0', 'trend' => 'No data yet'],
                    ['label' => 'Today Events', 'value' => '0', 'trend' => 'No data yet'],
                ],
                [
                    ['user' => 'System', 'action' => 'Database not migrated yet', 'time' => 'now'],
                ],
            ];
        }
    }
}
