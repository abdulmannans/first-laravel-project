<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class ArticlesController extends Controller
{
    public function show(Article $article)
    {
        // Render a single resource.

        return view('articles.show', compact('article'));
    }

    public function index() 
    {
        // Show a list of resource.
        if(request('tag')){
            $articles = Tag::where('name', request('tag'))->firstOrFail()->article;
        }else{
            $articles = Article::latest()->get();
        }

        
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        // Shows a view to create a new resource.
        $tags = Tag::all();
        return view('articles.create', compact('tags'));

    }

    public function store()
    {
        // Persist the new resource.
        
       $article= new  Article($this->validateArticle());
       $article->user_id = 1;
       $article->save();
       $article->tags()->attach(request('tags'));


        return redirect('articles');
    }

    public function edit(Article $article)
    {
        // Show a view to edit an existing resource.

        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
        $article->update($this->validateArticle());

        return redirect('articles');
        
    }

    public function destroy()
    {
        // Delete the resource.
    }

    protected function validateArticle(){
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}