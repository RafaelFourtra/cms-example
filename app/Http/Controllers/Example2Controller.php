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
    public function create() {
        return view('article-create');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(Request $request)
    {
        // dd('hasd');
        try {
            $image = $request->file('thumbnail'); 

            $imageData = file_get_contents($image->getRealPath());
            $imageType = $image->getMimeType(); // Contohnya: 'image/jpeg'    
            $base64Image = base64_encode($imageData);
            $imageUri = 'data:' . $imageType . ';base64,' . $base64Image;


            CMSModel::create([
                'title' => $request->title,
                'author' => $request->author,
                'publication_date' => $request->publication_date,
                'thumbnail' => $imageUri,
                'description' => $request->description,
            ]);
            return redirect()->intended('cms');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Store- Terjadi kesalahan: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Store- Terjadi kesalahan: ' . $e->getMessage());
        }
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