<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $posts = Post::paginate(2);

        return view('pages.index')->with('posts',$posts);

    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('pages.show', ['post' => $post]);

    }


}
