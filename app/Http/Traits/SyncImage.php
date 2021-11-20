<?php
namespace App\Http\Traits;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 *
 */
trait SyncImage
{



    private function sync(String $image,Model $model){
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
    
    public function syncImage(Request $request,Model $model)
    {
        try {
            $image = $this->upload($request->modelImageContent, $request->modelImageName);
            if ($image == false) return false;
            $this->sync($image, $model);
            session()->flash('success', 'Imagem adicionada com sucesso.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Erro ao addicionar Imagem.');
                              return redirect()->back();
        }
       
}
}

