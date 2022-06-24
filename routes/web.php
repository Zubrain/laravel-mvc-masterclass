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

Route::get('/fun/response', function () use ($posts) {
    return response($posts, 201)
        ->header('Content-Type', 'application/json')
        ->cookie('my-cookie', 'Zubillion', 3600);
});

Route::get('/fun/redirect', function () {
    return redirect('/');
});
Route::get('/fun/back', function () {
    return back();
});
Route::get('/fun/named-route', function () {
    return redirect()->route('posts.show', ['id' => 1]);
});
Route::get('/fun/away', function () {
    return redirect()->away('https://google.com');
});
Route::get('/fun/json', function() use($posts) {

});
