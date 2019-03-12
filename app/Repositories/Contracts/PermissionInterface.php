<?php

namespace App\Repositories\Contracts;

interface PermissionInterface
{
    /**
     * Find a permission by its name.
     *
     * @param string $name
     *
     * @throws \App\Repositories\Exceptions\PermissionDoesNotExist
     *
     * @return Permission
     */
    public function findByName($name);
}
