<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PostRequest;
use App\Http\Requests\Backend\UploadImage as BackendUploadImage;
use App\Http\Traits\DeleteImages;
use App\Http\Traits\SyncImage;
use App\Http\Traits\UploadImage;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    use UploadImage, SyncImage,DeleteImages;



    public function imageStore(BackendUploadImage $request, Post $post)
    {

        return $this->syncImage($request, $post);
    }

    public function imageDelete(Request $request,Post $post)
    {
        try {
            $status = $this->deleteImages($request->all(),$post);
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
        return view('backend.post.index')->with('posts', Post::paginate(2)->fragment('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.createEdit')->with(['post' => null, 'categories' => Category::all(), 'tags' => Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        try {
            Post::create($request->all());
            session()->flash('success', 'Post criado com sucesso.');
            return redirect()->back();
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na criação do post.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = Post::where('id',$post->id)->with('images')->first();
        return view('backend.gallery.gallery',[
            "title" => $post->title,
            'modelIndexRoute' => "post.index",
            'modelStoreImageRoute' => "post.uploadImage",
            'modelDeleteImageRoute' => 'post.deleteImage',
            'model' => $post,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('backend.post.createEdit')->with([
            'post' => $post,
            'categories' => Category::all(), 'tags' => $this->filtered($post->tags, Tag::all())
        ]);
    }
    private function filtered($postTags, $tags)
    {

        $data = collect([]);
        foreach ($tags as $tag) {
            $test = false;
            foreach ($postTags as $value) {
                if ($tag->id ==  $value->id) $test = true;
            }
            if ($test) {
                $data->add(new ViewTag($tag->id, $tag->name, "selected"));
            } else $data->add(new ViewTag($tag->id, $tag->name, ""));;
        }
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        //dd($request->all());
        try {
            $post->update($request->all());
            session()->flash('success', 'Post actualizado com sucesso.');
            return redirect()->back();
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do post. ' .$e);
              return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post) {
            try {
                $post->videos()->sync([]);
                $post->images()->sync([]);

                foreach ( $post->comments as  $comment) {
                    $comment->delete();
                }

                foreach ( $post->sections as  $section) {
                    $section->delete();
                }

                $post->delete();

                session()->flash('success', 'Post deletado com sucesso.');
                return redirect()->route('post.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar post.');
                return redirect()->route('post.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar post.');
            return redirect()->route('post.index');
        }
    }
}

class ViewTag
{
    public $id;
    public $name;
    public $selected;

    public function __construct(int $id, string $name, string $selected)
    {
        $this->id = $id;
        $this->name = $name;
        $this->selected = $selected;
    }
}
