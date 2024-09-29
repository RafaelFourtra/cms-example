<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProfileModel;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
            $data = ProfileModel::orderBy('id', 'DESC')->first();
            $category = CategoryModel::all();
            // dd($data);
            return view('web.pages.profile.index', compact('data', 'category'));
    }
}
