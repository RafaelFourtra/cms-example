<?php

use App\Http\Controllers\Example2Controller;
use App\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ExampleController::class, 'index'])->name('index.art');
Route::get('/detail/{id}', [ExampleController::class, 'edit'])->name('detail.edit');
Route::resource('cms', Example2Controller::class);


