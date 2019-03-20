<?php

namespace App\Models;

use App\Traits\HasDishes;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasDishes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type_menu_id',
    ];

    /**
     * Menu has one confirmation.
     */
    public function confirmation()
    {
        return $this->hasOne('App\Models\Confirmation');
    }

    /**
     * A type menu can be applied to Menu.
     */
    public function typeMenu()
    {
        return $this->belongsTo('App\Models\TypeMenu');
    }

    /**
     * A type menu can be applied to Menu.
     */
    public function dishes()
    {
        return $this->belongsToMany('App\Models\Dish', 'menu_has_dishes');
    }
}
