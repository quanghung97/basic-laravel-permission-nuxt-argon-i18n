<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use App\Repositories\Facades\PermissionRepository;
use App\Repositories\Facades\RoleRepository;

trait HasRoles
{
    use HasPermissions;

    /**
     * Scope the user query to certain roles only.
     *
     * @param string|array|Role|\Illuminate\Support\Collection $roles
     *
     * @return bool
     */
    public function scopeRole($query, $roles)
    {
        if ($roles instanceof Collection) {
            $roles = $roles->all();
        }

        if (!is_array($roles)) {
            $roles = [$roles];
        }

        $roles = array_map(function ($role) {
            if ($role instanceof Role) {
                return $role;
            }

            return RoleRepository::findByName($role);
        }, $roles);

        return $query->whereHas('roles', function ($query) use ($roles) {
            $query->where(function ($query) use ($roles) {
                foreach ($roles as $role) {
                    $query->orWhere('roles.id', $role->id);
                }
            });
        });
    }

    /**
     * Assign the given role to the user.
     *
     * @param array|string|\App\Models\Role ...$roles
     *
     * @return \App\Repositories\Contracts\Role
     */
    public function assignRole(...$roles)
    {
        $roles = collect($roles)
            ->flatten()
            ->map(function ($role) {
                return $this->getStoredRole($role);
            })
            ->all();

        $this->roles()->saveMany($roles);

        return $this;
    }

    /**
     * Revoke the given role from the user.
     *
     * @param string|Role $role
     */
    public function removeRole($role)
    {
        $this->roles()->detach($this->getStoredRole($role));
    }

    /**
     * Remove all current roles and set the given ones.
     *
     * @param array ...$roles
     *
     * @return $this
     */
    public function syncRoles(...$roles)
    {
        $this->roles()->detach();

        return $this->assignRole($roles);
    }

    /**
     * Determine if the user has (one of) the given role(s).
     *
     * @param string|array|Role|\Illuminate\Support\Collection $roles
     *
     * @return bool
     */
    public function hasRole($roles)
    {
        if (is_string($roles)) {
            return $this->roles->contains('name', $roles);
        }

        if ($roles instanceof RoleRepository) {
            return $this->roles->contains('id', $roles->id);
        }

        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }

            return false;
        }

        return (bool) $roles->intersect($this->roles)->count();
    }

    /**
     * Determine if the user has any of the given role(s).
     *
     * @param string|array|Role|\Illuminate\Support\Collection $roles
     *
     * @return bool
     */
    public function hasAnyRole($roles)
    {
        return $this->hasRole($roles);
    }

    /**
     * Determine if the user has all of the given role(s).
     *
     * @param string|Role|\Illuminate\Support\Collection $roles
     *
     * @return bool
     */
    public function hasAllRoles($roles)
    {
        if (is_string($roles)) {
            return $this->roles->contains('name', $roles);
        }

        if ($roles instanceof RoleRepository) {
            return $this->roles->contains('id', $roles->id);
        }

        $roles = collect()->make($roles)->map(function ($role) {
            return $role instanceof RoleRepository ? $role->name : $role;
        });

        return $roles->intersect($this->roles->pluck('name')) == $roles;
    }

    /**
     * Determine if the user may perform the given permission.
     *
     * @param string|PermissionRepository $permission
     *
     * @return bool
     */
    public function hasPermissionTo($permission)
    {
        if (is_string($permission)) {
            $permission = PermissionRepository::findByName($permission);
        }

        return $this->hasDirectPermission($permission) || $this->hasPermissionViaRole($permission);
    }

    /**
     * Determine if the user has any of the given permissions.
     *
     * @param array ...$permissions
     *
     * @return bool
     */
    public function hasAnyPermission(...$permissions)
    {
        if (is_array($permissions[0])) {
            $permissions = $permissions[0];
        }

        foreach ($permissions as $permission) {
            if ($this->hasPermissionTo($permission)) {
                return true;
            }
        }

        return false;
    }

    /**
     * use hasPermissionTo instead.
     *
     * Determine if the user may perform the given permission.
     *
     * @param PermissionRepository $permission
     *
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->hasPermissionTo($permission);
    }

    /**
     * Determine if the user has, via roles, the given permission.
     *
     * @param PermissionRepository $permission
     *
     * @return bool
     */
    protected function hasPermissionViaRole(Permission $permission)
    {
        return $this->hasRole($permission->roles);
    }

    /**
     * Determine if the user has the given permission.
     *
     * @param string|PermissionRepository $permission
     *
     * @return bool
     */
    public function hasDirectPermission($permission)
    {
        if (is_string($permission)) {
            $permission = PermissionRepository::findByName($permission);

            if (!$permission) {
                return false;
            }
        }

        return $this->permissions->contains('id', $permission->id);
    }

    /**
     * @param $role
     *
     * @return Role
     */
    protected function getStoredRole($role)
    {
        if (is_string($role)) {
            return RoleRepository::findByName($role);
        }

        return $role;
    }

    /**
     * Return all  permissions the directory coupled to the user.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getDirectPermissions()
    {
        return $this->permissions;
    }

    /**
     * Return all the permissions the user has via roles.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getPermissionsViaRoles()
    {
        return $this->load('roles', 'roles.permissions')
            ->roles->flatMap(function ($role) {
                return $role->permissions;
            })->sort()->values();
    }

    /**
     * Return all the permissions the user has, both directly and via roles.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllPermissions()
    {
        return $this->permissions->merge($this->getPermissionsViaRoles())->sort()->values();
    }

    /**
     * Return all the roles the user has.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getRoleNames()
    {
        return $this->roles->pluck('name');
    }
}
