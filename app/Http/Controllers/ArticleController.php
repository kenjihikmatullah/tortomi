<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::select('id', 'image_path', 'title', 'views')->with('user')->get();

        foreach ($articles as $article)
        {
            $article->transformPath();
        }

        return response()->json(['articles' => $articles], Response::HTTP_OK);
    }

    public function show($id)
    {
        $article = Article::find($id);
        $article->transformPath();
        $article->user = User::find($article->user_id);
        
        return response()->json(['article' => $article], Response::HTTP_OK);
    }

    public function read($id)
    {
        $article = Article::find($id);
        $article->increment('views', 1);

        return response()->json(['success' => true], Response::HTTP_OK);
    }
}
