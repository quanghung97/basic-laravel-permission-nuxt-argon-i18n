<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'content',
        'uuid',
    ];

    /**
     * A user can be applied to Blog.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
