<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
    return view('welcome', [
        'name' => 'Faishal'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About'
    ]);
});

Route::get('/blog', function () {
    return view('blog', [
        'title' => 'Blog',
        'post' => Post::all()
    ]);
});

Route::get('/post', function () {
    return view('post', [
        'title' => 'Post',
    ]);
});

Route::get('post/{slug}', function($slug){
    return view('post',[
        'title' => 'Single Post',
        'post' => Post::find($slug)
    ]);
});

Route::get('/siswa', 'App\Http\Controllers\SiswaController@index');

Route::post('/siswa/create', 'App\Http\Controllers\SiswaController@create');

Route::get('/siswa/{id}/edit', 'App\Http\Controllers\SiswaController@edit');

Route::post('/siswa/{id}/update', 'App\Http\Controllers\SiswaController@update');

Route::get('/siswa/{id}/delete', 'App\Http\Controllers\SiswaController@delete');

Route::get('/nomor_surat', 'App\Http\Controllers\NomorSuratController@index');
Route::post('/nomor_surat_tambah', 'App\Http\Controllers\NomorSuratController@create');