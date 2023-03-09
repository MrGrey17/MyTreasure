<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Article;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Resources\ArticleCollection;
use App\Http\Requests\StoreArticleRequest;


class ArticleController extends Controller
{
    public function index()
    {
        return new ArticleCollection(Article::paginate(9));
    }

    public function store(StoreArticleRequest $request)
    {   
        $validatedData = $request->validated();
        $path = $request->file('image')->store('articles/images', 'public');
        $article = Article::create($request->only('title', 'description', 'image'));
        $article->image = $path;
        $article->likesAndDisslikes = 0;
        $article->views = 0;
        $article->created_by = Auth::user()->name;

        date_default_timezone_set('Europe/Kiev');

        $article->save();
        return new ArticleResource($article);
    }

    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    public function update(Request $request, Article $article)
    {
        if($request->file('image') == True){
            Storage::disk('public')->delete($article->image);
            $path = $request->file('image')->store('articles/images', 'public');
            $article->image = $path; 
        }

        date_default_timezone_set('Europe/Kiev');

        $article->update($request->only('title', 'description'));
        return new ArticleResource($article);
    }

    public function destroy(Article $article)
    {
        Storage::disk('public')->delete($article->image);
        $article->delete();
        return null; // TODO: return to dashboard in admin/user panel
    }
}
