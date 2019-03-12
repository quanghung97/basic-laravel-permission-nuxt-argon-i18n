<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'phone', 'request',
    ];

    /**
     * Order has one confirmation.
     */
    public function confirmation()
    {
        return $this->hasOne('App\Models\Confirmation');
    }
}
