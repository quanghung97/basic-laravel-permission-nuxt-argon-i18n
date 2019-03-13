<?php

namespace App\Traits;

use App\Repositories\Facades\DishRepository;

trait HasDishes
{
    /**
     * Assign the given Dishes to the menus.
     *
     * @param array|string|\App\Models\Dish ...$dishes
     *
     * @return \App\Repositories\Contracts\TypeServiceInterface
     */
    public function assignDish(...$dishes)
    {
        $dishes = collect($dishes)
            ->flatten()
            ->map(function ($dish) {
                return $this->getStoredDish($dish);
            })
            ->all();

        $this->typeServices()->saveMany($dishes);

        return $this;
    }

    /**
     * @param $typeService
     *
     * @return TypeService
     */
    protected function getStoredDish($dish)
    {
        if (is_string($dish)) {
            return DishRepository::findBy('name', $dish);
        }

        return $dish;
    }

    /**
     * Return all the type Services the location has.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getDishNames()
    {
        return $this->dishes->pluck('name');
    }

    /**
     * Remove all current type Services and set the given ones.
     *
     * @param array ...$typeServices
     *
     * @return $this
     */
    public function syncDish(...$dishes)
    {
        $this->dishes()->detach();

        return $this->assignDish($dishes);
    }
}
