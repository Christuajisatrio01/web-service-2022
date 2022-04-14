<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\BlogController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/resume',function(){
    return view('resume');
});

Route::get('/portfolio',function(){
    return view('portfolio');
});

Route::get('/contact',function(){
    return view('contact');
});

Route::get('/link', function(){
    return view('home');
});

Route::get('/tes', function () {
    echo 'dari url coba';
});

Route::get('/about',function(){
    return view('about');
});

Route::view('welcome', 'welcome');

route::get('/mahasiswa/{nama}', function ($nama){
    return "Nama Mahasiswa : $nama";
});

Route::view('master','template/master');

//route untuk mahasiswa
Route::get('data-mahasiswa', [MahasiswaController::class, 'index']);
Route::get('add-mahasiswa', [MahasiswaController::class, 'create']);
Route::post('getDataM',[MahasiswaController::class,'ambilData'])->name('mahasiswa.getDataM');
Route::delete('delete-mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('delete-mahasiswa');
Route::get('edit-mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('edit.mahasiswa');
Route::put('edit-mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('update.mahasiswa');
//Tugas
Route::get('data-blog', [BlogController::class, 'index']);
Route::get('add-blog', [BlogController::class, 'create']);
Route::post('getData',[BlogController::class,'ambilData'])->name('blog.getData');
Route::delete('delete-blog/{id}', [BlogController::class, 'destroy'])->name('delete-blog');
Route::get('edit-blog/{id}/edit', [BlogController::class, 'edit'])->name('edit.blog');
Route::put('edit-blog/{id}', [BlogController::class, 'update'])->name('update.blog');
Route::delete('delete-blog/{id}', [BlogController::class,'destroy'])->name('delete.blog');

Route::delete('delete-mahasiswa/{id}', [MahasiswaController::class,'destroy'])->name('delete.mahasiswa');

