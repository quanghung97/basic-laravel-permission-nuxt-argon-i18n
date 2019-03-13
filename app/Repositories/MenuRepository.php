<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Repositories\Contracts\MenuInterface;

class MenuRepository extends BaseRepository implements MenuInterface
{
    public function __construct(Menu $menu)
    {
        parent::__construct($menu);
    }
}
