<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    /**
     * A user can be applied to confirmation.
     */
    public function status()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * A location can be applied to confirmation.
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }

    /**
     * A order can be applied to confirmation.
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    /**
     * A menu can be applied to confirmation.
     */
    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }
}
