<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'View Dashboard', 'slug' => 'dashboard.view'],
            ['name' => 'Manage Users', 'slug' => 'users.manage'],
            ['name' => 'View Audit Trail', 'slug' => 'audit.view'],
            ['name' => 'Manage Roles', 'slug' => 'roles.manage'],
            ['name' => 'Manage Settings', 'slug' => 'settings.manage'],
        ];

        $created = [];
        foreach ($permissions as $permission) {
            $created[] = Permission::query()->updateOrCreate(['slug' => $permission['slug']], $permission)->id;
        }

        $adminRole = Role::query()->where('slug', 'admin')->first();
        if ($adminRole) {
            $adminRole->permissions()->syncWithoutDetaching($created);
        }
    }
}
