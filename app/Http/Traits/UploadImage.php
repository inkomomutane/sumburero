<?php

namespace App\Http\Traits;

use App\Http\Traits\RemoveAccent;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

/**
 * Upload images
 */
trait UploadImage
{
    use RemoveAccent;

    public function upload(String $imageContent,String $imageName,String $strogePath = "images")
    {
        try {
            $path =  str_replace(" ", "_", $this->str_without_accents($imageName));
            $imageName = $strogePath .'/' . $path . '.' . 'png';
            $imageContent = str_replace('data:image/png;base64,', '', $imageContent);
            $imageContent = str_replace(' ', '+', $imageContent);
            Storage::put('public'.'/'.$imageName, base64_decode($imageContent));
            ImageOptimizer::optimize(
            Storage::path('public'.'/'.$imageName),
            Storage::path('public'.'/'.$imageName)
        );
            return $imageName;
        } catch (\Throwable $throw) {
           
            return false;
        }
    }
}

