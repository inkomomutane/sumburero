<?php

namespace App\Http\Traits;

use App\Http\Traits\RemoveAccent;
use Illuminate\Support\Facades\Storage;

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
            return $imageName;
        } catch (\Throwable $throw) {
            return false;
        }
    }
}

