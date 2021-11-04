<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Post;


class PostsController extends Controller
{
    public function show($slug){

       


        // $posts = [
        //     "first-post" => 'Hello This is my first blog post',
        //     'second-post' => 'Getting hang of blogging'
        // ];
    
    
        // if(! array_key_exists($post, $posts)){
        //     abort(404, 'Sorry, that post was not found.'); 
        // }
    
        return view('posts', [
            'post' => Post::where('slug', $slug)->firstOrFail()
        ]);
    }
}
