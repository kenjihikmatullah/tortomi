<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all('id, user_id, image_path, title');

        return response()->json(['articles' => $articles], Response::HTTP_OK);
    }

    public function show(Article $article)
    {
        return response()->json(['article' => $article], Response::HTTP_OK);
    }

    public function read(Article $article)
    {
        $article->increment('views', 1);

        return response(Response::HTTP_OK);
    }
}
