<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Website;

class WebsiteController extends Controller
{
    public function index()
    {
        $website = Website::all();
        $website =  ($website->count() > 0 )? $website->first(): '';

        return view('frontend.home.home')->with([
            'website' => $website,
            'posts' => Post::all()->take(3)
        ]);
    }
}
