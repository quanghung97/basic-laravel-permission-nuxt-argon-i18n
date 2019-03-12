<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * Get the location record associated with the status.
     */
    public function location()
    {
        return $this->hasOne('App\Models\Location');
    }
}
