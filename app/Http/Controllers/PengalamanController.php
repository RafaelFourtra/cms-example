<?php

namespace App\Http\Controllers;

use App\Models\PengalamanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PengalamanController extends Controller
{
    public function index(Request $request)
    {

        $data = PengalamanModel::all();

        return response()->json(compact('data'));
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
                'institusi' => ['required'],
                'deskripsi' => ['required'],
                'tahunmulai' => ['required'],
                'tahunselesai' => ['required'],
            ]);

            PengalamanModel::create([
                'profile_id' => 1,
                'institusi' => $request->institusi,
                'deskripsi' => $request->deskripsi,
                'tahunmulai' => $request->tahunmulai,
                'tahunselesai' => $request->tahunselesai,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Success',
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Store Master Pengalaman - Terjadi kesalahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Validasi Error.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Store Master Pengalaman - Terjadi kesalahan: ' . $e->getMessage());
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
        // $data = PendidikanModel::where('id', $id)->first();
        // return view('admin.pendidi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'institusi' => ['required'],
                'deskripsi' => ['required'],
                'tahunmulai' => ['required'],
                'tahunselesai' => ['required'],
            ]);

            $pengalaman = PengalamanModel::findOrFail($id);
            $pengalaman->update([
                'profile_id' => 1,
                'institusi' => $request->institusi,
                'deskripsi' => $request->deskripsi,
                'tahunmulai' => $request->tahunmulai,
                'tahunselesai' => $request->tahunselesai,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Success',
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Update Master Pengalaman - Terjadi kesalahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Validasi Error.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Update Master Pengalaman - Terjadi kesalahan: ' . $e->getMessage());
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
            $pengalaman = PengalamanModel::findOrFail($id);
            $pengalaman->delete();
            return response()->json([
                'success' => true,
                'message' => 'Success',
            ], 200);
        } catch (\Exception $e) {
            Log::error('Delete Master Pengalaman - Terjadi kesalahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error'
            ], 500);
        }
    }
}

