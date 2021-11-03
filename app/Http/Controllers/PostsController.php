<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{
    public function show($slug){

        $post = DB::table('posts')->where('slug', $slug)->first();
        
    


        // $posts = [
        //     "first-post" => 'Hello This is my first blog post',
        //     'second-post' => 'Getting hang of blogging'
        // ];
    
    
        // if(! array_key_exists($post, $posts)){
        //     abort(404, 'Sorry, that post was not found.'); 
        // }
    
        return view('posts', [
            'post' => $post
        ]);
    }
}
