<?php

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
    return view('welcome');
});
$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel'
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP'
    ]
];

Route::get('/posts/{id}', function ($id)  use ($posts) {
    abort_if(!isset($posts[$id]), 404);
    return view('posts.show', ['post' => $posts[$id]]);
})->name('posts.show');

Route::view('/', 'posts.show');



Route::prefix('fun')->name('fun.')->group(function () use ($posts) {
    Route::get('/response', function () use ($posts) {
        return response($posts, 201)
            ->header('Content-Type', 'application/json')
            ->cookie('my-cookie', 'Zubillion', 3600);
    })->name('response');

    Route::get('/redirect', function () {
        return redirect('/');
    })->name('redirect');
    Route::get('/back', function () {
        return back();
    })->name('back');
    Route::get('/named-route', function () {
        return redirect()->route('posts.show', ['id' => 1]);
    })->name('named-route');
    Route::get('/away', function () {
        return redirect()->away('https://google.com');
    })->name('away');
    Route::get('/json', function () use ($posts) {
        return response()->json($posts);
    })->name('json');
    Route::get('/download', function () use ($posts) {
        return response()->download(public_path('/daniel.jpg'), 'face.jpg');
    })->name('download');
});

