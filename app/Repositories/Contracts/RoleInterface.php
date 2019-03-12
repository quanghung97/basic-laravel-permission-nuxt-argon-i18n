<?php

namespace App\Repositories\Contracts;

interface RoleInterface
{
    /**
     * Find a role by its name.
     *
     * @param string $name
     *
     * @throws RoleDoesNotExist
     */
    public function findByName($name);
}
