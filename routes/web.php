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
Auth::loginUsingId(10);
//Auth::logout();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/lessons', function (){
    $lessons = \App\Lesson::latest()->paginate(15);
    if (Auth::check()){
        $favorites = \App\Favorite::where('user_id',Auth::user()->id)
            ->pluck('lesson_id')->toArray();
    }
    return view('lessons.index', compact('lessons','favorites'));
});

Route::resource('/favorite', 'FavoritesController');