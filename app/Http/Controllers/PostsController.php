<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($post){
        $posts = [
            "first-post" => 'Hello This is my first blog post',
            'second-post' => 'Getting hang of blogging'
        ];
    
    
        if(! array_key_exists($post, $posts)){
            abort(404, 'Sorry, that post was not found.'); 
        }
    
        return view('posts', [
            'post' => $posts[$post]
        ]);
    }
}
