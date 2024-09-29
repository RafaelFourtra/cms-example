<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\PendidikanModel;
use App\Models\PengalamanModel;
use App\Models\ProfileModel;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
            $data = ProfileModel::orderBy('id', 'DESC')->first();
            $dataPend = PendidikanModel::where('profile_id', $data->id)->get();
            $dataPeng = PengalamanModel::where('profile_id', $data->id)->get();

            if (!$data) {
                abort(404);
            }
            $category = CategoryModel::all();
            // dd($data);
            return view('web.pages.profile.index', compact('data', 'category', 'dataPend', 'dataPeng'));
    }
}
