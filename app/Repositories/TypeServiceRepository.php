<?php

namespace App\Repositories;

use App\Models\TypeService;
use App\Repositories\Contracts\TypeServiceInterface;

class TypeServiceRepository extends BaseRepository implements TypeServiceInterface
{
    public function __construct(TypeService $TypeService)
    {
        parent::__construct($TypeService);
    }
}
