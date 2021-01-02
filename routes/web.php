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
Route::middleware('front.data.share')->group(function ()
{
    Route::get('/', 'FrontController@index')->name('index');
    Route::get('/resume', 'FrontController@resume')->name('resume');
    Route::get('/portfolio', 'FrontController@portfolio')->name('portfolio');
    Route::get('/blog', 'FrontController@blog')->name('blog');
    Route::get('/contact', 'FrontController@contact')->name('contact');

});


Route::prefix('admin')->middleware('auth')->group(function ()
{
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::prefix('/education')->group(function ()
    {
        Route::get('/list', 'EducationController@list')->name('admin.education.list');
        Route::post('/change-status', 'EducationController@changeStatus')->name('admin.education.changeStatus');
        Route::post('/delete', 'EducationController@delete')->name('admin.education.delete');
        Route::get('/add', 'EducationController@addShow')->name('admin.education.add');
        Route::post('/add', 'EducationController@add');
    });

    Route::prefix('/experience')->group(function ()
    {
        Route::get('/list', 'ExperienceController@list')->name('admin.experience.list');
        Route::get('/add', 'ExperienceController@addShow')->name('admin.experience.add');
        Route::post('/add', 'ExperienceController@add');
        Route::post('/change-status', 'ExperienceController@changeStatus')->name('admin.experience.changeStatus');
        Route::post('/change-active', 'ExperienceController@activeStatus')->name('admin.experience.activeStatus');
        Route::post('/delete', 'ExperienceController@delete')->name('admin.experience.delete');

    });

    Route::get('personal-information', 'PersonalInformationController@index')->name('personalInformation.index');
    Route::post('personal-information', 'PersonalInformationController@update');

    Route::prefix('social-media')->group(function ()
    {
        Route::get('/list', 'SocialMediaController@list')->name('admin.socialMedia.list');
        Route::get('/add', 'SocialMediaController@addShow')->name('admin.socialMedia.add');
        Route::post('/add', 'SocialMediaController@add');
        Route::post('/change-status', 'SocialMediaController@changeStatus')->name('admin.socialMedia.changeStatus');
        Route::post('/delete', 'SocialMediaController@delete')->name('admin.socialMedia.delete');
    });

});


Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
