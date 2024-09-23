<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::query()->latest()->take(4)->get();
        return view('web.pages.home.index', [
            'category' => CategoryModel::all(),
            'articles' => $articles,
        ]);
    }
}
