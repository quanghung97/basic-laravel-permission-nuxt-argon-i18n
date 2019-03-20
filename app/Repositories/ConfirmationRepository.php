<?php

namespace App\Repositories;

use App\Models\Confirmation;
use App\Repositories\Contracts\ConfirmationInterface;

class ConfirmationRepository extends BaseRepository implements ConfirmationInterface
{
    public function __construct(Confirmation $confirmation)
    {
        parent::__construct($confirmation);
    }
}
