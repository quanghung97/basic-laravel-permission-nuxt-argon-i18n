<?php

namespace App\Repositories\Facades;

use Illuminate\Support\Facades\Facade;

class RoleRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\\Repositories\\Contracts\\RoleInterface';
    }
}
