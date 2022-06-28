<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;

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

Route::resource('post', PostController::class)->only(['index', 'show']);

// Route::get('/posts/{id}', function ($id)  use ($posts) {
//     abort_if(!isset($posts[$id]), 404);
//     return view('posts.show', ['post' => $posts[$id]]);
// })->name('posts.show');

// // Route::view('/', 'posts.show');
// Route::get('/post', function () {
//     dd((int)request()->query('tag', 1));
// });



// Route::prefix('fun')->name('fun.')->group(function () use ($posts) {
//     Route::get('/response', function () use ($posts) {
//         return response($posts, 201)
//             ->header('Content-Type', 'application/json')
//             ->cookie('my-cookie', 'Zubillion', 3600);
//     })->name('response');

//     Route::get('/redirect', function () {
//         return redirect('/');
//     })->name('redirect');
//     Route::get('/back', function () {
//         return back();
//     })->name('back');
//     Route::get('/named-route', function () {
//         return redirect()->route('posts.show', ['id' => 1]);
//     })->name('named-route');
//     Route::get('/away', function () {
//         return redirect()->away('https://google.com');
//     })->name('away');
//     Route::get('/json', function () use ($posts) {
//         return response()->json($posts);
//     })->name('json');
//     Route::get('/download', function () use ($posts) {
//         return response()->download(public_path('/daniel.jpg'), 'face.jpg');
//     })->name('download');
// });

// Route::get('/home', [HomeController::class, 'home']);

// Route::get('/single', AboutController::class);