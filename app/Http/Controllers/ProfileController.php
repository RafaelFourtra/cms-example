<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\InfoModel;
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
        $category = CategoryModel::all();
        $info = InfoModel::orderBy('id', 'DESC')->first();
        // dd($data);
        return view('web.pages.profile.index', compact('data', 'category', 'dataPend', 'dataPeng', 'info'));
    }
}
