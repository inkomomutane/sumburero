<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 *
 */
trait CoverImage
{
    public function linkImage(Request $request, $model, $id)
    {
        $model = $model::find($id);
        $valid = $request->validate([
            'cover_image' => 'required'
        ]);

        if ($valid) {
            try {
                $model->cover_image = $request->cover_image;
                $model->save();
                session()->flash('success', 'Imagen selecionada com sucesso.');
               return redirect()->back();
            } catch (\Throwable $th) {
                session()->flash('error', 'Erro ao selecionar Imagen.');
               return redirect()->back();
                 return false;
            }
        }
        return false;
    }
}
