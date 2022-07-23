<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

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



// Route::resource('post', PostController::class)->only(['index', 'show']);

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

// Route::get('/', function () {
//     return view('index');
// })->name('home.index');

// Route::get('/contact', function () {
//     return view('contact');
// })->name('home.contact');

// Route::get('/posts', function () {
//     return view('posts.show');
// })->name('posts.show');

// Route::get('/posts/{id}/edit', function ($id) {
//     return view('posts.edit');
// })->name('posts.edit');

// Route::get('/posts/create', function () {
//     return view('posts.create');
// })->name('posts.create');


Route::get('/', [PostController::class, 'index'])->name('home.index');

//show single post
Route::get('/post/{id}', [PostController::class, 'show'])->name('posts.show');

//Show create new post form
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

//Store New Listing Data
Route::post('/posts', [PostController::class, 'store']);

//Show edit form
Route::get('/post/{post}/edit', [PostController::class, 'edit']);

//Update post
Route::put('/post/{post}', [PostController::class, 'update']);

//Delete post
Route::delete('/post/{post}', [PostController::class, 'destroy']);



Route::get('/contact', [ContactController::class, 'index'])->name('home.contact');
