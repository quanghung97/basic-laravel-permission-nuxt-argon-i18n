<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Contracts\RoleInterface;

class RoleRepository extends BaseRepository implements RoleInterface
{
    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

    /**
     * Find a role by its name.
     *
     * @param string $name
     *
     * @throws RoleDoesNotExist
     *
     * @return Role
     */
    public function findByName($name)
    {
        $role = static::where('name', $name)->first();

        if (!$role) {
            throw new RoleDoesNotExist();
        }

        return $role;
    }
}
