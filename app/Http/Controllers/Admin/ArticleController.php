<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class ArticleController extends Controller
{
    public function datatables(Request $request)
    {
        $articles = Article::with('category')->get();

        return DataTables::of($articles)
            ->editColumn('thumbnail', function($row) {
                return '<img src="' . asset($row->thumbnail) . '" style="width: 200px" alt="Article">';
            })
            ->addColumn('action', function($row) {
                return '';
            })
            ->rawColumns(['action', 'thumbnail'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        return view('admin.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = CategoryModel::all();
        return view('admin.article.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        try {
            $request = $request->validated();
            $file = $request['thumbnail'];
            $request['thumbnail'] = $file->move('resources/img/articles/', Str::limit(Str::slug($request['title']), 50, '') . '-' . strtotime('now') . '.' . $file->getClientOriginalExtension());
            $article = Article::create($request);

            return ResponseHelper::success(data: $article, message: 'Artikel berhasil disimpan.', code: 201);
        } catch (\Throwable $th) {
            Log::error('[create article] {th}', ['th' => $th]);
            return ResponseHelper::error(message: 'System Error!', code: 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
