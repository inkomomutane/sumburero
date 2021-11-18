<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Delete image from storage
 */
trait DeleteImages
{
    private function deleteImages($array, Model $model){
        try {
            foreach($array as $id => $value){
                if ($id != '_token') {
                     $image = $model->images->where('id',$id)->first();
                     $image->delete();
                     Storage::delete('public/'.$value);
                }
            }
            return 200;
        } catch (\Throwable $th) {
            return 403;
        }

    }
}


