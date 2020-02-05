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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//Seleccionar Idioma
Route::get('/set_language/{lang}', 'Controller@setLanguage' )->name('set language');

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/courses/{path}/{attachment}', function($path, $attachment){
    $file = sprintf('storage/courses/%s/%s', $path, $attachment);
    if (File::exists($file)) {
        // Si el archivo existe
        return \Intervention\Image\Facades\Image::make($file)->response();
    }
});

Route::group(['prefix' => 'subscriptions'], function(){
    Route::get('/plans', 'SubscriptionController@plans')->name('subscriptions.plans');
    Route::post('/process_subscription', 'SubscriptionController@processSubscription')->name('subscriptions.process_subscription');
});

Route::group(['prefix' => 'courses'], function () {
    Route::get('/{course}', 'CourseController@show')->name('courses.detail');
});