<?php

use App\Http\Controllers\Admin\BentukKegiatanController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\OpeningController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Example2Controller;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\Admin\LoginController;
use App\Models\OpeningModel;
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

Route::get('/',  [HomeController::class, 'index'])->name('home.index.web');


Route::prefix('pages')->name('pages.')->group(function () {
    Route::resource('articles', \App\Http\Controllers\ArticleController::class)->only(['index', 'show']);
    Route::resource('home', \App\Http\Controllers\HomeController::class)->only(['index', 'show']);
    Route::resource('profile', \App\Http\Controllers\ProfileController::class)->only(['index', 'show']);
    
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('articles/datatables', [\App\Http\Controllers\Admin\ArticleController::class, 'datatables'])->name('articles.datatables');
    Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class)->middleware('auth');
    Route::resource('category', CategoryController::class)->middleware('auth');
    Route::resource('profile', ProfileController::class)->middleware('auth');
    Route::resource('pendidikan', PendidikanController::class)->middleware('auth');
    Route::resource('pengalaman', PengalamanController::class)->middleware('auth');
    Route::resource('info', InfoController::class)->middleware('auth');
    Route::resource('opening', OpeningController::class)->middleware('auth');
    Route::resource('bentukkegiatan', BentukKegiatanController::class)->middleware('auth');
    Route::resource('faq', FAQController::class)->middleware('auth');
});


