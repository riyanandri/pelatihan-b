<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Routing untuk fitur post
Route::middleware(['auth', 'verified'])->group(function () {

    // read data
    Route::get('/post', [PostController::class, 'tampil'])->name('post.tampil');
    
    // menampilkan form tambah data
    Route::get('/post/create', [PostController::class, 'tambah'])->name('post.tambah');

    // menyimpan data
    Route::post('/post', [PostController::class, 'simpan'])->name('post.simpan');

    // menampilkan form edit data
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');

    // update data
    Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');

    // delete data
    Route::delete('/post/{id}', [PostController::class, 'hapus'])->name('post.hapus');
});


require __DIR__.'/auth.php';
