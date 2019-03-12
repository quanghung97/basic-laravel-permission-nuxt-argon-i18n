<?php

namespace App\Repositories;

use App\Models\Location;
use Webpatser\Uuid\Uuid;
use App\Repositories\Contracts\ImageInterface;
use App\Repositories\Contracts\LocationInterface;
use File;

class LocationRepository extends BaseRepository implements LocationInterface, ImageInterface
{
    public function __construct(Location $location)
    {
        parent::__construct($location);
    }

    public function storeImage($obj, $image)
    {
        $img_file_extension = $image->getClientOriginalExtension();
        if ($img_file_extension == 'PNG' || $img_file_extension == 'jpg' || $img_file_extension == 'jpeg' || $img_file_extension == 'png') {
            $img_file_name = $image->getClientOriginalName();
            $random_file_name = Uuid::generate()->string.$img_file_name;

            while (file_exists('image/location/'.$random_file_name)) {
                $random_file_name = Uuid::generate()->string.$img_file_name;
            }
            $image->move('image/location/', $random_file_name);
            if ($obj->link_image != null) {
                File::delete($obj->link_image);
            }
            $obj->link_image = 'image/location/'.$random_file_name;
            $obj->save();

            return true;
        } else {
            return false;
        }
    }
}
