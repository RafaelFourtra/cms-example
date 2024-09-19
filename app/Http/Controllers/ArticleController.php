<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->category) {
            $articles = Article::query()->latest()->take(4)->where('category_id', $request->category)->get();
            $categoryFilter = CategoryModel::where('id', $request->category)->first()->category;
        } else {
            $articles = Article::query()->latest()->take(4)->get();
            $categoryFilter = '';
        }
        

      
        // dd($articles);
        return view('web.pages.article.index', [
            'articles' => $articles,
            'category' => CategoryModel::all(),
            'categoryFilter' => $categoryFilter
        ]);
    }

    public function show($id)
    {
        return view('web.pages.article.show', [
            'article' => Article::query()->find($id),
            'category' => CategoryModel::all(),
        ]);
    }
}
