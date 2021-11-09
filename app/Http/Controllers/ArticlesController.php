<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function show($Id)
    {
        // Render a List of a resource.
        $article = Article::find($Id);

        return view('articles.show', ['article' => $article]);
    }

    public function index()
    {
        // Show a single resource.
        $article = Article::latest()->get();
        return view('articles.index', ['articles'=> $article]);
    }

    public function create()
    {
        // Shows a view to create a new resource.
        return view('articles.create');

    }

    public function store()
    {
        // Persist the new resource.
        request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);


        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('articles ');
    }

    public function edit($id)
    {
        // Show a view to edit an existing resource.
        $article = Article::find($id);

        return view('articles.edit', compact('article'));
    }

    public function update($id)
    {

        request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);
        
        $article = Article::find($id);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('articles ');
        
    }

    public function destroy()
    {
        // Delete the resource.
    }
}