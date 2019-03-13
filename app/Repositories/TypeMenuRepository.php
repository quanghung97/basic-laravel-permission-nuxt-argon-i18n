<?php

namespace App\Repositories;

use App\Models\TypeMenu;
use App\Repositories\Contracts\TypeMenuInterface;

class TypeMenuRepository extends BaseRepository implements TypeMenuInterface
{
    public function __construct(TypeMenu $typeMenu)
    {
        parent::__construct($typeMenu);
    }
}
