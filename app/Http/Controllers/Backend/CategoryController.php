<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\PaginationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UploadImage as BackendUploadImage;
use App\Http\Requests\Backend\CategoryRequest;
use App\Http\Traits\CoverImage;
use App\Http\Traits\DeleteImages;
use App\Http\Traits\SyncImage;
use App\Http\Traits\UploadImage;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    use UploadImage, SyncImage,DeleteImages,CoverImage;


    public function posts(String $category)
    {
        $category = Category::where('slug',$category)->first();
       // return $category;
       return view('frontend.category.posts')->with([
            'title' => $category->title,
            'category' => $category,
            'posts' => PaginationHelper::paginate($category->posts->where('published',true),15),
            'tags' => Tag::all()
        ]);
    }

    public function imageStore(BackendUploadImage $request, Category $category)
    {
        return $this->syncImage($request, $category);
    }

    public function imageDelete(Request $request,Category $category)
    {
        try {
            $status = $this->deleteImages($request->all(),$category);
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
        return view('backend.category.category')->with('categories', Category::all());
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
     * @param  \App\Http\Requests\Category\Add  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            Category::create($request->all());
            session()->flash('success', 'Category criada com sucesso.');
            return redirect()->route('category.index');
        } catch (\Throwable $e) {
            throw $e;
            session()->flash('error', 'Erro na criação da categoria.');
            return redirect()->route('category.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = Category::where('id',$category->id)->with('images')->first();
        return view('backend.gallery.gallery',[
            "title" => $category->name,
            'modelIndexRoute' => "category.index",
            'modelStoreImageRoute' => "category.uploadImage",
            'modelDeleteImageRoute' => 'category.deleteImage',
            'model' => $category,
            'imageLinkRoute'=>'category.linkImage'

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->all());
            session()->flash('success', 'Category actualizada com sucesso.');
            return redirect()->route('category.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização da categoria.');
            return redirect()->route('category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {


        if ($category) {
            try {
                $category->posts()->sync([]);
                $category->images()->sync([]);
                $category->videos()->sync([]);
                $category->delete();

                session()->flash('success', 'Category deletada com sucesso.');
                return redirect()->route('category.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar categoria.');
                return redirect()->route('category.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " A categoria esta sendo usada em um post."');
            return redirect()->route('category.index');
        }
    }
}
