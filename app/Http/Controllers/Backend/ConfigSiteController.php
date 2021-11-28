<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Traits\CoverImage;
use App\Models\Website;
use Illuminate\Http\Request;
use App\Http\Traits\DeleteImages;
use App\Http\Traits\SyncImage;
use App\Http\Traits\UploadImage;

class ConfigSiteController extends Controller
{
    use UploadImage, SyncImage,DeleteImages,CoverImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $website = Website::all();
        if($website->count() > 0) return view('backend.website.website')->with('website',$website->first());
        return view('backend.website.website')->with('website',null);
    }


    public function imageStore(Request $request,Website $website)
    {
        return $this->syncImage($request, $website);
    }
    public function imageDelete(Request $request,Website $website)
    {
        try {
            $status = $this->deleteImages($request->all(),$website);
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
    public function show(Website $website)
    {
        $website = Website::where('id',$website->id)->first();
        return view('backend.gallery.gallery',[
            "title" => $website->name,
            'modelIndexRoute' => "website.index",
            'modelStoreImageRoute' => "website.uploadImage",
            'modelDeleteImageRoute' => 'website.deleteImage',
            'model' => $website,
            'imageLinkRoute'=>'website.linkImage'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            Website::create($request->all());
            session()->flash('success', 'Configurações guardadas com sucesso');
            return redirect()->route('website.index');
        } catch (\Throwable $th) {
            session()->flash('error', 'Erro ao guardar informações Erro:  ' . $th);
            return redirect()->route('website.index');
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Website $website)
    {
        $valid = $request->validate([
            "name" => "required",
            "country" => "string",
            "emails" => "email",
            "phones" => 'numeric',
            "open_at" => 'date_format:h:i A',
            "close_at" =>' date_format:h:i A|after:open_at',
            "map" => "max:5000",
            "resume" => "max:500",
            "mission" => "max:5000",
            "vision" => "max:5000",
            "objectives" => "max:5000"
        ]);
        try {
            $website->update($valid);
            session()->flash('success', 'Configurações guardadas com sucesso');
            return redirect()->route('website.index');
        } catch (\Throwable $th) {
            session()->flash('error', 'Erro ao guardar informações Erro:  ' . $th);
            return redirect()->route('website.index');
        }

    }
}
