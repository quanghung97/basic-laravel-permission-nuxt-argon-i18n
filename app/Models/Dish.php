<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'link_image', 'type_dish_id',
    ];

    /**
     * A type dish can be applied to Dish.
     */
    public function typeDish()
    {
        return $this->belongsTo('App\Models\TypeDish');
    }

    /**
     * A user can be applied to Blog.
     */
    public function menus()
    {
        return $this->belongsToMany('App\Models\Menu', 'menu_has_dishes');
    }
}
