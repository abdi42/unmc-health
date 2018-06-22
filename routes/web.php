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


Route::get('/welcome', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/auth0/callback','\Auth0\Login\Auth0Controller@callback')->name('auth0-callback');
//Route::get('/login','Auth\Auth0IndexController@login')->name('login');
//Route::get('/logout','Auth\Auth0IndexController@logout')->name('logout')->middleware('auth');
//Route::get('/profile', 'Auth\Auth0IndexController@profile' )->name( 'profile' )->middleware('auth');

//Route::get('/auth0/callback',function(){
//    dd(Auth0::getUser());
//});

/*
 *
 * Routes for the APIs
 */


//Route::get('/testapi','HealthController@alluserinfo');
Route::get('/getweightinfo','HealthController@index');
Route::get('/getbpinfo','HealthController@bpinfo');