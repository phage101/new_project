<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::query()->updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'      => 'Admin',
                'password'  => Hash::make('password'),
                'is_active' => true,
            ]
        );

        $adminRole = Role::query()->where('slug', 'admin')->first();
        if ($adminRole && !$admin->roles()->where('roles.id', $adminRole->id)->exists()) {
            $admin->roles()->attach($adminRole->id);
        }
    }
}
