<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfileController;
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

Route::get('/', function () {
    return to_route('pages.articles.index');
});

Route::get('/detail/{id}', [ExampleController::class, 'edit'])->name('detail.edit');

Route::resource('cms', Example2Controller::class);

Route::prefix('pages')->name('pages.')->group(function () {
    Route::resource('articles', \App\Http\Controllers\ArticleController::class)->only(['index', 'show']);
    
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('articles/datatables', [\App\Http\Controllers\Admin\ArticleController::class, 'datatables'])->name('articles.datatables');
    Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('pendidikan', ProfileController::class);
    Route::resource('pengalaman', ProfileController::class);



});


