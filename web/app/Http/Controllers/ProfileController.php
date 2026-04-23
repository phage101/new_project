<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.index', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validateWithBag('profileErrors', [
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->update($validated);

        ActivityLog::create([
            'user_id'    => $user->id,
            'action'     => 'profile.updated',
            'model_type' => get_class($user),
            'model_id'   => $user->id,
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Profile updated.');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validateWithBag('passwordErrors', [
            'current_password' => ['required', 'current_password'],
            'password'         => ['required', 'confirmed', Password::min(8)],
        ]);

        $user->update(['password' => Hash::make($request->input('password'))]);

        ActivityLog::create([
            'user_id'    => $user->id,
            'action'     => 'profile.password_changed',
            'model_type' => get_class($user),
            'model_id'   => $user->id,
            'ip_address' => $request->ip(),
        ]);

        return back()->with('password_success', 'Password changed.');
    }
}
