<?php

namespace App\Traits;

use App\Repositories\Facades\PermissionRepository;

trait HasPermissions
{
    /**
     * Grant the given permission(s) to a role.
     *
     * @param string|array|Permission|\Illuminate\Support\Collection $permissions
     *
     * @return HasPermissions
     */
    public function givePermissionTo(...$permissions)
    {
        $permissions = collect($permissions)
            ->flatten()
            ->map(function ($permission) {
                return $this->getStoredPermission($permission);
            })
            ->all();

        $this->permissions()->saveMany($permissions);

        return $this;
    }

    /**
     * Remove all current permissions and set the given ones.
     *
     * @param array ...$permissions
     *
     * @return $this
     */
    public function syncPermissions(...$permissions)
    {
        $this->permissions()->detach();

        return $this->givePermissionTo($permissions);
    }

    /**
     * Revoke the given permission.
     *
     * @param $permission
     *
     * @return HasPermissions
     */
    public function revokePermissionTo($permission)
    {
        $this->permissions()->detach($this->getStoredPermission($permission));

        return $this;
    }

    /**
     * @param string|array|PermissionRepository|\Illuminate\Support\Collection $permissions
     *
     * @return PermissionRepository
     */
    protected function getStoredPermission($permissions)
    {
        if (is_string($permissions)) {
            return PermissionRepository::findByName($permissions);
        }

        if (is_array($permissions)) {
            return PermissionRepository::whereIn('name', $permissions)->get();
        }

        return $permissions;
    }
}
