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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

// Route::get('/courses', 'App\Http\Controllers\CourseController@index')->name('courses.index');
// Route::get('/course/{id}', 'App\Http\Controllers\CourseController@index')->name('course.episode');

Route::group(['auth:sanctum', 'verified'],function(){

    Route::get('/courses', 'App\Http\Controllers\CourseController@index')->name('courses.index');
    Route::get('/course/{id}', 'App\Http\Controllers\CourseController@show')->name('course.episode');    
});