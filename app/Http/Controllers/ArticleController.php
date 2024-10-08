<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CategoryModel;
use App\Models\InfoModel;
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
        
        $info = InfoModel::orderBy('id', 'DESC')->first();
      
        // dd($articles);
        return view('web.pages.article.index', [
            'articles' => $articles,
            'category' => CategoryModel::all(),
            'info' => $info,
            'categoryFilter' => $categoryFilter
        ]);
    }

    public function show($id)
    {
        $info = InfoModel::orderBy('id', 'DESC')->first();
        $article = Article::query()->find($id);

        if ($article->youtube) {
            $url = $article->youtube;
    
            // Convert 'youtu.be' links to 'youtube.com/embed'
            if (strpos($url, 'youtu.be') !== false) {
                $videoId = substr(parse_url($url, PHP_URL_PATH), 1);
                $article->youtube = 'https://www.youtube.com/embed/' . $videoId . '?autoplay=1&mute=1';
            }
    
            // Convert 'youtube.com/watch?v=' links to 'youtube.com/embed/'
            elseif (strpos($url, 'watch?v=') !== false) {
                $query = parse_url($url, PHP_URL_QUERY);
                parse_str($query, $params);
                $article->youtube = 'https://www.youtube.com/embed/' . $params['v'] . '?autoplay=1&mute=1';
            }
        }

        //dd($article->youtube);

        return view('web.pages.article.show', [
            'article' => $article,
            'category' => CategoryModel::all(),
            'info' => $info
        ]);
    }
}
