<?php

namespace App\Services\Helpers\Traits;

use Intervention\Image\Facades\Image;

trait ModelObserveImage
{
    public static function bootModelObserveImage()
    {
        // self::saved(function ($model){
        //     $img = Image::make(public_path($model->image));
        //     if($img->width() > 100){
        //         $img->resize(100, null, function ($con){
        //             $con->aspectRatio();
        //         });
        //         $img->save();
        //     }
        // });
    }
}
