<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BentukKegiatanModel;
use App\Models\CategoryModel;
use App\Models\FAQModel;
use App\Models\InfoModel;
use App\Models\OpeningModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::query()->latest()->take(6)->get()->map(function ($article) {
            $article->description = Str::limit(strip_tags($article->description), 130, '...');
            return $article;
        });
        $opening = OpeningModel::orderBy('id', 'DESC')->first();
        $info = InfoModel::orderBy('id', 'DESC')->first();
        $faq = FAQModel::all();
        $bentukkegiatan = BentukKegiatanModel::all();

        //dd($articles);
        return view('web.pages.home.index', [
            'category' => CategoryModel::all(),
            'articles' => $articles,
            'opening' => $opening,
            'faq' => $faq,
            'bentukkegiatan' => $bentukkegiatan,
            'info' => $info
        ]);
    }
}
