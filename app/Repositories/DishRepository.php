<?php

namespace App\Repositories;

use App\Models\Dish;
use Webpatser\Uuid\Uuid;
use App\Repositories\Contracts\ImageInterface;
use App\Repositories\Contracts\DishInterface;
use File;

class DishRepository extends BaseRepository implements DishInterface, ImageInterface
{
    public function __construct(Dish $dish)
    {
        parent::__construct($dish);
    }

    public function storeImage($obj, $image)
    {
        $img_file_extension = $image->getClientOriginalExtension();
        if ($img_file_extension == 'PNG' || $img_file_extension == 'jpg' || $img_file_extension == 'jpeg' || $img_file_extension == 'png') {
            $img_file_name = $image->getClientOriginalName();
            $random_file_name = Uuid::generate()->string.$img_file_name;

            while (file_exists('image/dish/'.$random_file_name)) {
                $random_file_name = Uuid::generate()->string.$img_file_name;
            }
            $image->move('image/dish/', $random_file_name);
            if ($obj->link_image != null) {
                File::delete($obj->link_image);
            }
            $obj->link_image = 'image/dish/'.$random_file_name;
            $obj->save();

            return true;
        } else {
            return false;
        }
    }
}
