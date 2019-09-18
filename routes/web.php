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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{provider}', 'SocialController@redirect');

Route::get('login/{provider}/callback','SocialController@Callback');

Route::get('/send/email', 'HomeController@mail')->name('verified');

Route::get('/user/verify/{token}', 'HomeController@verifyUser');

Route::get('/submit','ProfilesController@submitprofile')->name('profiledata');

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/create/profile','ProfilesController@create')->name('profile.create');

    Route::get('/profile/view','ProfilesController@view')->name('profile.view');

    Route::post('/create/profile','ProfilesController@store')->name('profile.store');

    Route::get('/profiles', 'ProfilesController@index')->name('profile.details');

    Route::get('/edit/profile/{id}','ProfilesController@edit')->name('profile.edit');

    Route::patch('/edit/profile/{id}','ProfilesController@update')->name('profile.update');

    Route::delete('/delete/profile/{id}','ProfilesController@destroy')->name('profile.delete');

    Route::get('/confirm/profile/{id}','ProfilesController@confirm')->name('profile.confirm');

    Route::get('/profiles/create-step2', 'ProfilesController@createstep2')->name('profile.step2');

    Route::post('/profiles/storestep', 'ProfilesController@storestep')->name('profile.stepstore');

    Route::get('profile/thanks','ProfilesController@thanks')->name('profile.thanks');

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
