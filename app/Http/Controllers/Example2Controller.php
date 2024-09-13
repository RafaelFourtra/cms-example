<?php

namespace App\Http\Controllers;

use App\Models\CMSModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Example2Controller extends Controller
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
    public function create()
    {
        return view('article-create');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(Request $request)
    {
        $youtubeUrl = $request->thumbnail;

        // Ambil ID Video YouTube
        $youtubeId = $this->getYouTubeVideoId($youtubeUrl);

        try {
            CMSModel::create([
                'title' => $request->title,
                'category' => $request->category,
                'author' => $request->author,
                'publication_date' => $request->publication_date,
                'thumbnail' => $youtubeId,
                'description' => $request->description,
            ]);
            return redirect()->intended('cms');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Store- Terjadi kesalahan: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Store- Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    private function  getYouTubeVideoId($url)
    {
        // Parse URL
        $parsedUrl = parse_url($url);

        // Cek apakah bagian 'host' ada
        if (!isset($parsedUrl['host'])) {
            return null; // URL tidak valid atau tidak memiliki host
        }

        // Untuk format URL pendek seperti https://youtu.be/ID
        if ($parsedUrl['host'] == 'youtu.be') {
            return ltrim($parsedUrl['path'], '/'); // Mengambil ID video dari path
        }

        // Untuk format URL standar seperti https://www.youtube.com/watch?v=ID
        if (strpos($parsedUrl['host'], 'youtube.com') !== false) {
            if (isset($parsedUrl['query'])) {
                parse_str($parsedUrl['query'], $queryParams);
                return $queryParams['v'] ?? null; 
            }
        }

        return null;
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     $data = CategoryModel::where('id', $id)->first();
    //     return view('master.category.edit', compact('data'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, $id)
    // {
    //     try {
    //         $request->validate([
    //             'category' => ['required']
    //         ], [
    //             'category.required' => 'The Category field is required.',
    //         ]);

    //         $category = CategoryModel::findOrFail($id);
    //         $category->update([
    //             'category' => $request->category,
    //         ]);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Success',
    //         ], 200);
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         Log::error('Update Master Category - Terjadi kesalahan: ' . $e->getMessage());
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Validasi Error.',
    //             'errors' => $e->errors()
    //         ], 422);
    //     } catch (\Exception $e) {
    //         Log::error('Update Master Category - Terjadi kesalahan: ' . $e->getMessage());
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error'
    //         ], 500);
    //     }
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy($id)
    // {
    //     try {
    //         $category = CategoryModel::findOrFail($id);
    //         $category->delete();
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Success',
    //         ], 200);
    //     } catch (\Exception $e) {
    //         Log::error('Delete Master Category - Terjadi kesalahan: ' . $e->getMessage());
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error'
    //         ], 500);
    //     }
    // }
}
