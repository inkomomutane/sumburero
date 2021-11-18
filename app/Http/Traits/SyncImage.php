<?php
namespace App\Http\Traits;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
trait SyncImage
{
    public function syncImage(String $image,Model $model)
    {
        try {
           $image = Image::create([
                'url' => $image,
                'imageable_id' => $model->id,
                'imageable_type' => get_class($model)
            ]);
            return $image;
        } catch (\Throwable $th) {
            return false;
        }
    }
}

