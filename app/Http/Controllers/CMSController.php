<?php

namespace App\Http\Controllers;

use App\Models\CMSModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CMSController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CMSModel::all();
            return response()->json(compact('data'));
        }
        
        return view('article');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('article-create');

    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = CMSModel::where('id', $id)->first();
        return view('article-edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $cms = CMSModel::findOrFail($id);
            $cms->update([
                'title' => $request->title,
                'author' => $request->author,
                'publication_date' => $request->publication_date,
                'thumbnail' => $request->thumbnail,
                'description' => $request->description,
            ]);

          return redirect()->route('cms.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error');        
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $category = CMSModel::findOrFail($id);
            $category->delete();
            return response()->json([
                'success' => true,
                'message' => 'Success',
            ], 200);
        } catch (\Exception $e) {
            Log::error('Delete CMS - Terjadi kesalahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error'
            ], 500);
        }
    }
}
