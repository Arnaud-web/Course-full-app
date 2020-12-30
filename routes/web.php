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
// Route::get('/', 'App\Http\Controllers\CourseController@index')->name('courses.index');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    // return Inertia\Inertia::render('Dashboard');
    return Redirect::route('courses.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
    // return Redirect::route('courses.index');
})->name('dashboard');
// Route::get('/courses', 'App\Http\Controllers\CourseController@index')->name('courses.index');
// Route::get('/course/{id}', 'App\Http\Controllers\CourseController@index')->name('course.episode');
Route::get('/courses', 'App\Http\Controllers\CourseController@index')->name('courses.index');

Route::group(['auth:sanctum', 'verified'], function () {
    Route::post('/courses/create', 'App\Http\Controllers\CourseController@store')->name('courses.store');
    Route::get('/courses/create', 'App\Http\Controllers\CourseController@create')->name('courses.create');
    Route::get('/courses/edit/{id}', 'App\Http\Controllers\CourseController@edit')->name('courses.edit');
    Route::patch('/courses/{id}', 'App\Http\Controllers\CourseController@update')->name('course.update');
    Route::delete('/courses/{id}', 'App\Http\Controllers\CourseController@deleteFormation')->name('course.deleteFormation');
    Route::get('/course/{id}', 'App\Http\Controllers\CourseController@show')->name('course.episode');
    Route::post('/toggleProgress', 'App\Http\Controllers\CourseController@toggleProgress')->name('course.toggle');
});
