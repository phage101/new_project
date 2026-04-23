<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::withTrashed()->with('roles')->orderBy('name')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::orderBy('name')->get();
        return view('users.form', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::min(8)],
            'role_id' => ['nullable', 'exists:roles,id'],
        ]);

        $user = User::create([
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'password'  => Hash::make($validated['password']),
            'is_active' => true,
        ]);

        if (!empty($validated['role_id'])) {
            $user->roles()->attach($validated['role_id']);
        }

        ActivityLog::create([
            'user_id'    => Auth::id(),
            'action'     => 'user.created',
            'model_type' => User::class,
            'model_id'   => $user->id,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('users.index')
            ->with('success', "User \"{$user->name}\" created.");
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();
        return view('users.form', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', Password::min(8)],
            'role_id' => ['nullable', 'exists:roles,id'],
        ]);

        $user->update([
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ]);

        if (!empty($validated['password'])) {
            $user->update(['password' => Hash::make($validated['password'])]);
        }

        $user->roles()->sync(!empty($validated['role_id']) ? [$validated['role_id']] : []);

        ActivityLog::create([
            'user_id'    => Auth::id(),
            'action'     => 'user.updated',
            'model_type' => User::class,
            'model_id'   => $user->id,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('users.index')
            ->with('success', "User \"{$user->name}\" updated.");
    }

    public function deactivate(Request $request, User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot deactivate your own account.');
        }

        $newState = !$user->is_active;
        $user->update(['is_active' => $newState]);

        ActivityLog::create([
            'user_id'    => Auth::id(),
            'action'     => $newState ? 'user.activated' : 'user.deactivated',
            'model_type' => User::class,
            'model_id'   => $user->id,
            'ip_address' => $request->ip(),
        ]);

        $label = $newState ? 'activated' : 'deactivated';
        return back()->with('success', "User \"{$user->name}\" {$label}.");
    }

    public function destroy(Request $request, User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        ActivityLog::create([
            'user_id'    => Auth::id(),
            'action'     => 'user.deleted',
            'model_type' => User::class,
            'model_id'   => $user->id,
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', "User \"{$user->name}\" deleted.");
    }

    public function restore(Request $request, $id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        ActivityLog::create([
            'user_id'    => Auth::id(),
            'action'     => 'user.restored',
            'model_type' => User::class,
            'model_id'   => $user->id,
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', "User \"{$user->name}\" restored.");
    }
}
