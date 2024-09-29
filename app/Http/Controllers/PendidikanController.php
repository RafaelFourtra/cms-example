<?php

namespace App\Http\Controllers;

use App\Models\PendidikanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PendidikanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $data = PendidikanModel::all();
        // var_dump($data);
        return response()->json(compact('data'));
        }
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
                'tingkat' => ['required'],
                'institusi' => ['required'],
                'tahunmasuk' => ['required'],
                'tahunselesai' => ['required'],
            ]);

            PendidikanModel::create([
                'profile_id' => 1,
                'tingkat' => $request->tingkat,
                'institusi' => $request->institusi,
                'tahunmasuk' => $request->tahunmasuk,
                'tahunselesai' => $request->tahunselesai,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Success',
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Store Master Pendidikan - Terjadi kesalahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Validasi Error.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Store Master Pendidikan - Terjadi kesalahan: ' . $e->getMessage());
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
                'tingkat' => ['required'],
                'institusi' => ['required'],
                'tahunmasuk' => ['required'],
                'tahunselesai' => ['required'],
            ]);

            $pendidikan = PendidikanModel::findOrFail($id);
            $pendidikan->update([
                'profile_id' => 1,
                'tingkat' => $request->tingkat,
                'institusi' => $request->institusi,
                'tahunmasuk' => $request->tahunmasuk,
                'tahunselesai' => $request->tahunselesai,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Success',
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Update Master Pendidikan - Terjadi kesalahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Validasi Error.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Update Master Pendidikan - Terjadi kesalahan: ' . $e->getMessage());
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
            $pedidikan = PendidikanModel::findOrFail($id);
            $pedidikan->delete();
            return response()->json([
                'success' => true,
                'message' => 'Success',
            ], 200);
        } catch (\Exception $e) {
            Log::error('Delete Master Pendidikan - Terjadi kesalahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error'
            ], 500);
        }
    }
}
