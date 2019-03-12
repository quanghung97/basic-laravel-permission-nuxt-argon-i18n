<?php

namespace App\Repositories;

use App\Models\Status;
use App\Repositories\Contracts\StatusInterface;

class StatusRepository extends BaseRepository implements StatusInterface
{
    public function __construct(Status $status)
    {
        parent::__construct($status);
    }
}
