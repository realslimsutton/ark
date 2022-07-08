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
}
