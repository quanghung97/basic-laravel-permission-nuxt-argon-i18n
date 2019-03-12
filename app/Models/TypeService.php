<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * A location may be given various service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function locations()
    {
        return $this->belongsToMany('App\Models\Location', 'location_has_services');
    }
}
