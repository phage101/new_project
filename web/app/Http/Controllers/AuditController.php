<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index(Request $request)
    {
        $query = ActivityLog::with('user')
            ->orderByDesc('created_at');

        $logs = $query->get();

        $actions = ActivityLog::query()
            ->select('action')
            ->distinct()
            ->orderBy('action')
            ->pluck('action');

        $users = User::orderBy('name')->get(['id', 'name']);

        return view('audit.index', compact('logs', 'actions', 'users'));
    }
}
