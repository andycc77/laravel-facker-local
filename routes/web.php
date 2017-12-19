<?php

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

Route::get('/lessons', function (){
    $lessons = \App\Lesson::latest()->paginate(15);
//    dump($lessons->chunk(3));
    return view('lessons.index', compact('lessons'));
});