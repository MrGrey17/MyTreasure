<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Resources\ArticleCollection;


class ArticleController extends Controller
{
    public function index()
    {
        return new ArticleCollection(Article::paginate(10));
    }

    public function store(Request $request)
    {   
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        $article = Article::create($request->all());
        return new ArticleResource($article);
    }

    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return new ArticleResource($article);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return null;
    }
}
