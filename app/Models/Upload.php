<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'uuid', 'link_file',
    ];

    /**
     * A user can be applied to Upload.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
