<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CategoryModel::all();

            return response()->json(compact('data'));
        }
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'category' => ['required']
            ]);

            CategoryModel::create([
                'category' => $request->category,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Success',
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Store Master Category - Terjadi kesalahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Validasi Error.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Store Master Category - Terjadi kesalahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = CategoryModel::where('id', $id)->first();
        return view('admin.category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'category' => ['required']
            ]);

            $category = CategoryModel::findOrFail($id);
            $category->update([
                'category' => $request->category,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Success',
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Update Master Category - Terjadi kesalahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Validasi Error.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Update Master Category - Terjadi kesalahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $category = CategoryModel::findOrFail($id);
            $category->delete();
            return response()->json([
                'success' => true,
                'message' => 'Success',
            ], 200);
        } catch (\Exception $e) {
            Log::error('Delete Master Category - Terjadi kesalahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error'
            ], 500);
        }    
    }
}
