<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Repositories\Contracts\PermissionInterface;
use App\Repositories\Exceptions\PermissionDoesNotExist;

class PermissionRepository extends BaseRepository implements PermissionInterface
{
    public function __construct(Permission $permission)
    {
        parent::__construct($permission);
    }

    /**
     * Find a permission by its name.
     *
     * @param string $name
     *
     * @throws PermissionDoesNotExist
     *
     * @return Permission
     */
    public function findByName($name)
    {
        $permission = $this->model->where('name', $name)->first();

        if (!$permission) {
            throw new PermissionDoesNotExist();
        }

        return $permission;
    }
}
