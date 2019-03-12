<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;
use App\Repositories\Facades\RoleRepository;
use App\Repositories\Contracts\RoleInterface;
use App\Repositories\Contracts\UserInterface;

class UserRepository extends BaseRepository implements UserInterface
{
    protected $roleRepository;

    public function __construct(User $user, RoleInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
        parent::__construct($user);
    }

    // public function assignRole1($user, $roles)
    // {
    //     //using both of them
    //     // dont inject constructor
    //     //$roles = RoleRepository::where('name', $roles)->first();
    //     // using inject constructor should inject Interface binding in Provider not inject class
    //     $roles = $this->roleRepository->findByName($roles)->first();
    //     dd($roles);
    //     //$roles = Role::where('name', $roles)->first();
    //     $user->roles()->attach($roles);

    //     return $this;
    // }

    // public function scopeRole($query, $roles)
    // {
    //     if ($roles instanceof Collection) {
    //         $roles = $roles->all();
    //     }

    //     if (!is_array($roles)) {
    //         $roles = [$roles];
    //     }

    //     $roles = array_map(function ($role) {
    //         if ($role instanceof Role) {
    //             return $role;
    //         }

    //         return Role::findByName($role);
    //     }, $roles);

    //     return $query->whereHas('roles', function ($query) use ($roles) {
    //         $query->where(function ($query) use ($roles) {
    //             foreach ($roles as $role) {
    //                 $query->orWhere('roles'.'.id', $role->id);
    //             }
    //         });
    //     });
    // }

    // public function assignRole(...$roles)
    // {
    //     $roles = collect($roles)
    //         ->flatten()
    //         ->map(function ($role) {
    //             return $this->getStoredRole($role);
    //         })
    //         ->all();

    //     $this->model->roles()->saveMany($roles);

    //     return $this;
    // }

    // public function removeRole($role)
    // {
    //     $this->roles()->detach($this->getStoredRole($role));
    // }

    // public function syncRoles(...$roles)
    // {
    //     $this->roles()->detach();

    //     return $this->assignRole($roles);
    // }

    // public function hasRole($roles)
    // {
    //     if (is_string($roles)) {
    //         return $this->roles->contains('name', $roles);
    //     }

    //     if ($roles instanceof Role) {
    //         return $this->roles->contains('id', $roles->id);
    //     }

    //     if (is_array($roles)) {
    //         foreach ($roles as $role) {
    //             if ($this->hasRole($role)) {
    //                 return true;
    //             }
    //         }

    //         return false;
    //     }

    //     return (bool) $roles->intersect($this->roles)->count();
    // }

    // public function hasAllRoles($roles)
    // {
    //     if (is_string($roles)) {
    //         return $this->roles->contains('name', $roles);
    //     }

    //     if ($roles instanceof Role) {
    //         return $this->roles->contains('id', $roles->id);
    //     }

    //     $roles = collect()->make($roles)->map(function ($role) {
    //         return $role instanceof Role ? $role->name : $role;
    //     });

    //     return $roles->intersect($this->roles->pluck('name')) == $roles;
    // }

    // public function hasPermissionTo($permission)
    // {
    //     if (is_string($permission)) {
    //         $permission = app(Permission::class)->findByName($permission);
    //     }

    //     return $this->hasDirectPermission($permission) ||
    //      $this->hasPermissionViaRole($permission);
    // }

    // public function hasAnyPermission(...$permissions)
    // {
    //     if (is_array($permissions[0])) {
    //         $permissions = $permissions[0];
    //     }

    //     foreach ($permissions as $permission) {
    //         if ($this->hasPermissionTo($permission)) {
    //             return true;
    //         }
    //     }

    //     return false;
    // }

    // public function hasPermissionViaRole(Permission $permission)
    // {
    //     return $this->hasRole($permission->roles);
    // }

    // public function hasDirectPermission($permission)
    // {
    //     if (is_string($permission)) {
    //         $permission = app(Permission::class)->findByName($permission);

    //         if (!$permission) {
    //             return false;
    //         }
    //     }

    //     return $this->permissions->contains('id', $permission->id);
    // }

    // protected function getStoredRole($role)
    // {
    //     if (is_string($role)) {
    //         return $this->model->findBy('name', $role);
    //     }

    //     return $role;
    // }

    // public function getDirectPermissions()
    // {
    //     return $this->permissions;
    // }

    // public function getPermissionsViaRoles()
    // {
    //     return $this->load('roles', 'roles.permissions')
    //         ->roles->flatMap(function ($role) {
    //             return $role->permissions;
    //         })->sort()->values();
    // }

    // public function getAllPermissions()
    // {
    //     return $this->permissions->merge($this->getPermissionsViaRoles())->sort()->values();
    // }

    // public function givePermissionTo(...$permissions)
    // {
    //     $permissions = collect($permissions)
    //         ->flatten()
    //         ->map(function ($permission) {
    //             return $this->getStoredPermission($permission);
    //         })
    //         ->all();

    //     $this->permissions()->saveMany($permissions);

    //     $this->forgetCachedPermissions();

    //     return $this;
    // }

    // public function syncPermissions(...$permissions)
    // {
    //     $this->permissions()->detach();

    //     return $this->givePermissionTo($permissions);
    // }

    // public function revokePermissionTo($permission)
    // {
    //     $this->permissions()->detach($this->getStoredPermission($permission));

    //     $this->forgetCachedPermissions();

    //     return $this;
    // }

    // public function getStoredPermission($permissions)
    // {
    //     if (is_string($permissions)) {
    //         return app(Permission::class)->findByName($permissions);
    //     }

    //     if (is_array($permissions)) {
    //         return app(Permission::class)->whereIn('name', $permissions)->get();
    //     }

    //     return $permissions;
    // }
}
