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

/*Home Page*/
Route::get('/', function () {
    return view('welcome');
});

/* Welcome Page*/
Route::get('/welcome', 'WelcomeController@welcome')->name('welcome');

/* Authentication Routes */
Auth::routes();

/* Logout Route */
Route::get('logout','\App\Http\Controllers\Auth\LoginController@logout');

/* Page after the authenticated user is signed in (Dashboard Page)*/
Route::get('/home', 'HomeController@index')->name('home');

Route::get('subjects', 'SubjectsController@index');

/* Page showing list of users to get the weight details */
Route::get('/subjects/weight','SubjectsController@index_weight');

/* Page showing list of users to get the Blood Pressure details */
Route::get('/subjects/bloodpressure', 'SubjectsController@index_bloodpressure');

/* Page showing list of users to get the Blood Glucose details */
Route::get('/subjects/bloodglucose','SubjectsController@index_bloodglucose');

/* Page showing list of users to get the Pulse Oxygen details */
Route::get('/subjects/pulseoxygen','SubjectsController@index_pulseoxygen');

Route::get('/weights/{userid}','SubjectsController@show_weight');

Route::get('/bloodpressures/{userid}','SubjectsController@show_bloodpressure');

Route::get('/bloodglucoses/{userid}','SubjectsController@show_bloodglucose');

Route::get('/pulseoxygens/{userid}','SubjectsController@show_pulseoxygen');




Route::get('/contents','ContentsController@index');

Route::get('/contents/create', 'ContentsController@create');

Route::post('/contents', 'ContentsController@store');

Route::get('/contents/{id}','ContentsController@show');

Route::get('/contents/{id}/edit','ContentsController@edit');

Route::put('/contents/{id}','ContentsController@update');

Route::get('/contents/{id}/delete','ContentsController@delete');

Route::delete('/contents/{id}','ContentsController@destroy');




Route::get('/categories','CategoriesController@index');

Route::get('/categories/create','CategoriesController@create');

Route::post('/categories','CategoriesController@store');

Route::get('/categories/{id}','CategoriesController@show');

Route::get('/categories/{id}/edit','CategoriesController@edit');

Route::put('/categories/{id}','CategoriesController@update');

Route::get('/categories/{id}/delete','CategoriesController@delete');

Route::delete('/categories/{id}','CategoriesController@destroy');




Route::get('/tips','TipsController@index');

Route::get('/tips/create','TipsController@create');

Route::post('/tips','TipsController@store');

Route::get('/tips/{id}','TipsController@show');

Route::get('/tip/{id}/edit','TipsController@edit');

Route::put('/tip/{id}','TipsController@update');

Route::get('/tip/{id}/delete','TipsController@delete');

Route::delete('/tip/{id}','TipsController@destroy');


Route::get('/subjects_ihealth','SubjectsController@index');

Route::get('/subjects/create','SubjectsController@create');

Route:: post('/subjects','SubjectsController@store');

Route::get('/subjects/{subject}','SubjectsController@show');

Route::get('/subject/{subject}/edit','SubjectsController@edit');

Route::put('/subject/{subject}','SubjectsController@update');

Route::get('/subject/{subject}/delete','SubjectsController@delete');

Route::get('/subjects','SubjectsController@display');



Route::get('/actionplans','ActionplansController@index');

Route::get('/actionplans/create','ActionplansController@create');

Route::post('/actionplans','ActionplansController@store');


Route::get('/goals','GoalsController@index');

Route::get('/goals/create','GoalsController@create');

Route::post('/goals','GoalsController@store');



?>