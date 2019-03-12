<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeMenu extends Model
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
     * Type Menu has one menu.
     */
    public function menu()
    {
        return $this->hasOne('App\Models\Menu');
    }
}
