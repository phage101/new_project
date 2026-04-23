<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\ResourceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{
    public function index()
    {
        $items = ResourceModel::orderBy('name')->paginate(50)->withQueryString();
        return view('resource.index', compact('items'));
    }

    public function create()
    {
        return view('resource.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $item = ResourceModel::create($validated);

        ActivityLog::create([
            'user_id'    => Auth::id(),
            'action'     => 'resource.created',
            'model_type' => ResourceModel::class,
            'model_id'   => $item->id,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('resource.index')
            ->with('success', "\"{$item->name}\" created.");
    }

    public function edit(ResourceModel $resource)
    {
        return view('resource.edit', compact('resource'));
    }

    public function update(Request $request, ResourceModel $resource)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $resource->update($validated);

        ActivityLog::create([
            'user_id'    => Auth::id(),
            'action'     => 'resource.updated',
            'model_type' => ResourceModel::class,
            'model_id'   => $resource->id,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('resource.index')
            ->with('success', "\"{$resource->name}\" updated.");
    }

    public function deactivate(Request $request, ResourceModel $resource)
    {
        // Self-deactivation guard (for user-type resources)
        // if ($resource->id === Auth::id()) {
        //     return back()->with('error', 'You cannot deactivate your own account.');
        // }

        $newState = !$resource->is_active;
        $resource->update(['is_active' => $newState]);

        ActivityLog::create([
            'user_id'    => Auth::id(),
            'action'     => $newState ? 'resource.activated' : 'resource.deactivated',
            'model_type' => ResourceModel::class,
            'model_id'   => $resource->id,
            'ip_address' => $request->ip(),
        ]);

        $label = $newState ? 'activated' : 'deactivated';
        return back()->with('success', "\"{$resource->name}\" {$label}.");
    }
}
