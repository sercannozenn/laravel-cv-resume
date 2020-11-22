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

Route::get('/', 'FrontController@index')->name('index');
Route::get('/resume', 'FrontController@resume')->name('resume');
Route::get('/portfolio', 'FrontController@portfolio')->name('portfolio');
Route::get('/blog', 'FrontController@blog')->name('blog');
Route::get('/contact', 'FrontController@contact')->name('contact');



Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/education-list', 'EducationController@list')->name('admin.education.list');
    Route::post('/education-change-status', 'EducationController@changeStatus')->name('admin.education.changeStatus');
    Route::post('/education-delete', 'EducationController@delete')->name('admin.education.delete');
    Route::get('/education-add', 'EducationController@addShow')->name('admin.education.add');
    Route::post('/education-add', 'EducationController@add');
});


Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
