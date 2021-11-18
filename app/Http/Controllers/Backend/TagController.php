<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\TagRequest;
use App\Http\Requests\backend\UploadImage as BackendUploadImage;
use App\Http\Traits\DeleteImages;
use App\Http\Traits\SyncImage;
use App\Http\Traits\UploadImage;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    use UploadImage, SyncImage,DeleteImages;
    public function imageStore(BackendUploadImage $request, Tag $tag)
    {
       
        try {
            $image = $this->upload($request->modelImageContent, $request->modelImageName);
            if ($image == false) return false;
            $this->syncImage($image, $tag);
            session()->flash('success', 'Imagem adicionada com sucesso.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Erro ao addicionar Imagem.');
            return redirect()->back();
        }
    }

    public function imageDelete(Request $request,Tag $tag)
    {
        try {
            $status = $this->deleteImages($request->all(),$tag);
            if($status == 200){
               session()->flash('success', 'Imagens deletadas com sucesso.');
               return redirect()->back();
            }else{
               session()->flash('error', 'Erro ao deletar Imagens.');
               return redirect()->back();
            }

           } catch (\Throwable $th) {
               session()->flash('error', 'Erro ao deletar Imagens.'. $th);
               return redirect()->back();
           }
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.tag.tag')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Tag\Add  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        try {
            Tag::create($request->all());
            session()->flash('success', 'Tag criada com sucesso.');
            return redirect()->route('tag.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na criação da tag.');
            return redirect()->route('tag.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $tag = Tag::where('id',$tag->id)->with('images')->first();
        return view('backend.gallery.gallery',[
            "title" => $tag->name,
            'modelIndexRoute' => "tag.index",
            'modelStoreImageRoute' => "tag.uploadImage",
            'modelDeleteImageRoute' => 'tag.deleteImage',
            'model' => $tag,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        try {
            $tag->update($request->all());
            session()->flash('success', 'Tag actualizada com sucesso.');
            return redirect()->route('tag.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização da tag.');
            return redirect()->route('tag.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {


        if ($tag && $tag->imovels->count() == 0) {
            try {
                $tag->delete();
                session()->flash('success', 'Tag deletada com sucesso.');
                return redirect()->route('tag.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar tag.');
                return redirect()->route('tag.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " O tag esta sendo usada em um imóvel."');
            return redirect()->route('tag.index');
        }
    }
}
