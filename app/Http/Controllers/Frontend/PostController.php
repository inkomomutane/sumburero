<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\PaginationHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('frontend.news.news')->with([
            'tags' => Tag::all(),
            'categories' => Category::all(),
            'posts' => PaginationHelper::paginate(Post::all()->where('published',true),15),
        ]);
    }
    public function show(String $post)
    {  
        $post = Post::where('slug',$post)->first();
        return view('frontend.post.post')->with([
            'post' => $post,
            'tags' => Tag::all(),
            'categories' => Category::all()
        ]);
    }
}
