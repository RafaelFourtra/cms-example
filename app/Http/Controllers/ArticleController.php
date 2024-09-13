<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('web.pages.article.index', [
            'articles' => Article::query()->latest()->take(4)->get()
        ]);
    }

    public function show($id)
    {
        return view('web.pages.article.show', [
            'article' => Article::query()->find($id),
        ]);
    }
}
