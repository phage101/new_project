<?php

namespace App\Models\Concerns;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRoles
{
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole(string $slug): bool
    {
        return $this->roles()->where('slug', $slug)->exists();
    }

    public function hasPermission(string $permissionSlug): bool
    {
        return Permission::query()
            ->where('slug', $permissionSlug)
            ->whereHas('roles.users', function ($query) {
                $query->where('users.id', $this->id);
            })
            ->exists();
    }
}
