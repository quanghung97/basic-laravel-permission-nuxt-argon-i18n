<?php

namespace App\Repositories\Contracts;

interface ImageInterface
{
    /**
     * store image.
     *
     * @return mixed
     */
    public function storeImage($obj, $image);
}
