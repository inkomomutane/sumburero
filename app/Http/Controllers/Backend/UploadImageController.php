<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\UploadImage as BackendUploadImage;
use App\Http\Traits\SyncImage;
use App\Http\Traits\UploadImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    use UploadImage, SyncImage;
    

    public function create(BackendUploadImage $request, Model $model)
    {
       /* dd($model);
        try {
            $image = $this->upload($request->modelImageContent, $request->modelImageName);
            if ($image == false) return false;
            $this->syncImage($image, $model);
            session()->flash('success', 'Imagem adicionada com sucesso.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Erro ao addicionar Imagem.');
            return redirect()->back();
        }*/
    }
}
