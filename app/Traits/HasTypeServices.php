<?php

namespace App\Traits;

use App\Repositories\Facades\TypeServiceRepository;

trait HasTypeServices
{
    /**
     * Assign the given type services to the locations.
     *
     * @param array|string|\App\Models\TypeService ...$typeServices
     *
     * @return \App\Repositories\Contracts\TypeServiceInterface
     */
    public function assignService(...$typeServices)
    {
        $typeServices = collect($typeServices)
            ->flatten()
            ->map(function ($typeService) {
                return $this->getStoredTypeService($typeService);
            })
            ->all();

        $this->typeServices()->saveMany($typeServices);

        return $this;
    }

    /**
     * @param $typeService
     *
     * @return TypeService
     */
    protected function getStoredTypeService($typeService)
    {
        if (is_string($typeService)) {
            return TypeServiceRepository::findBy('name', $typeService);
        }

        return $typeService;
    }

    /**
     * Return all the type Services the location has.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getTypeServiceNames()
    {
        return $this->typeServices->pluck('name');
    }

    /**
     * Remove all current type Services and set the given ones.
     *
     * @param array ...$typeServices
     *
     * @return $this
     */
    public function syncService(...$typeServices)
    {
        $this->typeServices()->detach();

        return $this->assignService($typeServices);
    }
}
