<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProfileModel;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $data = ProfileModel::orderBy('id', 'DESC')->first();

        // dd($data);
        return view('admin.profile.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => ['required'],
                'tanggallahir' => ['required'],
                'tempatlahir' => ['required'],
            ]);

            ProfileModel::create([
                'nama' => $request->nama,
                'gelardepan' => $request->gelardepan,
                'gelarbelakang' => $request->gelarbelakang,
                'tanggallahir' => $request->tanggallahir,
                'tempatlahir' => $request->tempatlahir,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Success',
                'redirect' => route('admin.profile.index')
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Store Master Profile - Terjadi kesalahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Validasi Error.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Store Master Profile - Terjadi kesalahan: ' . $e->getMessage());
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
        $data = ProfileModel::where('id', $id)->first();
        return response()->json(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => ['required'],
                'tanggallahir' => ['required'],
                'tempatlahir' => ['required'],
            ]);

            $profile = ProfileModel::findOrFail($id);
            $profile->update([
                'nama' => $request->nama,
                'gelardepan' => $request->gelardepan,
                'gelarbelakang' => $request->gelarbelakang,
                'tanggallahir' => $request->tanggallahir,
                'tempatlahir' => $request->tempatlahir,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Success',
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Update Master Profile - Terjadi kesalahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Validasi Error.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Update Master Profile - Terjadi kesalahan: ' . $e->getMessage());
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
        // try {
        //     $category = CategoryModel::findOrFail($id);
        //     $category->delete();
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Success',
        //     ], 200);
        // } catch (\Exception $e) {
        //     Log::error('Delete Master Category - Terjadi kesalahan: ' . $e->getMessage());
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Error'
        //     ], 500);
        // }    
    }
}
