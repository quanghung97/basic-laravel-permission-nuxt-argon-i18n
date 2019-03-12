<?php

namespace App\Repositories\Contracts;

// use App\Models\Role;
// use App\Models\Permission;

interface UserInterface
{
    // /**
    //  * Assign the given role to the user.
    //  *
    //  * @param array|string|\App\Models\Role ...$roles
    //  *
    //  * @return \App\Repositories\Contracts\Role
    //  */
    // public function assignRole1($user, $roles);

    // /**
    //  * Revoke or cancel the given role from the user.
    //  *
    //  * @param string|\App\Models\Role $role
    //  */
    // public function removeRole($role);

    // /**
    //  * Remove all current roles and set the given ones, sync all roles after change something.
    //  *
    //  * @param string|\App\Models\Role ...$role
    //  *
    //  * @return $this
    //  */
    // public function syncRoles(...$roles);

    // /**
    //  * Make sure about if the user has one of the given roles.
    //  *
    //  * @param string|array|Role|\Illuminate\Support\Collection $roles
    //  *
    //  * @return bool
    //  */
    // public function hasRole($roles);

    // /**
    //  * Make sure about if the user has all of the given role.
    //  *
    //  * @param string|Role|\Illuminate\Support\Collection $roles
    //  *
    //  * @return bool
    //  */
    // public function hasAllRoles($roles);

    // /**
    //  * Make sure about if the user has the given permission.
    //  *
    //  * @param string|Permission $permission
    //  *
    //  * @return bool
    //  */
    // public function hasPermissionTo($permission);

    // /**
    //  * Make sure about if the user has any of the given permission.
    //  *
    //  * @param array ...$permissions
    //  *
    //  * @return bool
    //  */
    // public function hasAnyPermission(...$permissions);

    // /**
    //  * Make sure about if the user has (via roles) the given permission.
    //  *
    //  * @param Permission $permission
    //  *
    //  * @return bool
    //  */
    // public function hasPermissionViaRole(Permission $permission);

    // /**
    //  * Make sure about the user has the given permission.
    //  *
    //  * @param string|Permission $permission
    //  *
    //  * @return bool
    //  */
    // public function hasDirectPermission($permission);

    // /**
    //  * get Store Role.
    //  *
    //  * @param $role
    //  *
    //  * @return Role
    //  */
    // public function getStoreRole($role);

    // /**
    //  * Return all permissions.
    //  *
    //  * @return \Illuminate\Support\Collection
    //  */
    // public function getDirectPermissions();

    // /**
    //  * Return all the permissions the user has via roles.
    //  *
    //  * @return \Illuminate\Support\Collection
    //  */
    // public function getPermissionsViaRoles();

    // /**
    //  * Return all the permissions the user has, both directly and via roles.
    //  *
    //  * @return \Illuminate\Support\Collection
    //  */
    // public function getAllPermissions();

    // /**
    //  * Grant the given permission(s) to a role.
    //  *
    //  * @param string|array|Permission|\Illuminate\Support\Collection $permissions
    //  *
    //  * @return HasPermissions
    //  */
    // public function givePermissionTo(...$permissions);

    // /**
    //  * Remove all current permissions and set the given ones.
    //  *
    //  * @param array ...$permissions
    //  *
    //  * @return $this
    //  */
    // public function syncPermissions(...$permissions);

    // /**
    //  * Revoke the given permission.
    //  *
    //  * @param $permission
    //  *
    //  * @return HasPermissions
    //  */
    // public function revokePermissionTo($permission);

    // /**
    //  * @param string|array|Permission|\Illuminate\Support\Collection $permissions
    //  *
    //  * @return Permission
    //  */
    // public function getStoredPermission($permissions);
}
