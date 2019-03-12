<?php

namespace App\Models;

use App\Traits\HasTypeServices;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasTypeServices;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'min_people', 'max_people', 'status_id',
    ];

    /**
     * A services can be applied to locations.
     */
    public function typeServices()
    {
        return $this->belongsToMany('App\Models\TypeService', 'location_has_services');
    }

    /**
     * A status can be applied to location.
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    /**
     * A location has one confirmation.
     */
    public function confirmation()
    {
        return $this->hasOne('App\Models\Confirmation');
    }
}
