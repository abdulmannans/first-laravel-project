<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function show(Article $article)
    {
        // Render a List of a resource.

        return view('articles.show', compact('article'));
    }

    public function index()
    {
        // Show a single resource.
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        // Shows a view to create a new resource.
        return view('articles.create');

    }

    public function store()
    {
        // Persist the new resource.
        
        Article::create($this->validateArticle());

        return redirect('articles ');
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