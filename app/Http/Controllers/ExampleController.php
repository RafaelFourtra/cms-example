<?php

namespace App\Http\Controllers;

use App\Models\CMSModel;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        $data = CMSModel::all();
        return view('welcome', compact('data'));
    }

    public function edit($id)
    {
        $data = CMSModel::where('id', $id)->first();
        return view('detail', compact('data'));
    }
}
