<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $articles = Article::query()
            ->orderByDesc('published_at')
            ->paginate();

        return view('news.index', [
            'articles' => $articles
        ]);
    }

    public function show($slug)
    {
        $article = Article::query()
            ->where('slug', '=', $slug)
            ->firstOrFail();

        return view('news.show', [
            'article' => $article
        ]);
    }
}
