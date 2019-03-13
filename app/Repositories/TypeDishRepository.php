<?php

namespace App\Repositories;

use App\Models\TypeDish;
use App\Repositories\Contracts\TypeDishInterface;

class TypeDishRepository extends BaseRepository implements TypeDishInterface
{
    public function __construct(TypeDish $typeDish)
    {
        parent::__construct($typeDish);
    }
}
