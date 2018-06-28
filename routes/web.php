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

$url = "***REMOVED***                                                                                                      // Enter the URL to fetch the User Profile of all users
$json = file_get_contents($url);                                                                                // Read the details of the file in the form of a String
$response_user = json_decode($json);

Route::get('/', function () {
    return view('welcome');
});


Route::get('/welcome', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('logout','\App\Http\Controllers\Auth\LoginController@logout');
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

/* Subject 1 Routes */
Route::get('subject-1/getweightinfo','HealthController@index');
Route::get('subject-1/getbpinfo','HealthController@bpinfo');
Route::get('getuserinfo','HealthController@getuserinfo');
Route::get('subject-1/getbginfo','HealthController@bginfo');

/* Subject 2 Routes */
Route::get('subject-2/getbpinfo','HealthController@bpinfo_user2');
/* Subject 3 Routes */
Route::get('/subject-3/getbpinfo','HealthController@bpinfo_user3');

