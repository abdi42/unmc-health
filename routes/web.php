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


Route::get('/subjects/ihealth','SubjectsController@index');

Route::get('/subjects/create','SubjectsController@create');

Route:: post('/subjects','SubjectsController@store');

Route::get('/subjects/{subject}','SubjectsController@show');

Route::get('/subject/{subject}/edit','SubjectsController@edit');

Route::put('/subject/{subject}','SubjectsController@update');

Route::get('/subject/{subject}/delete','SubjectsController@delete');

Route::get('/subjects','SubjectsController@display');

Route::get('/subjects/userexists','SubjectsController@message');

Route::delete('/subjects/{subject}','SubjectsController@destroy');


Route::get('/actionplans','ActionplansController@index');

Route::get('/actionplans/create','ActionplansController@create');

Route::post('/actionplans','ActionplansController@store');

Route::get('/actionplans/{subject}','ActionplansController@show');

Route::get('/actionplans/{id}/edit','ActionplansController@edit');

Route::put('/actionplans/{id}','ActionplansController@update');

Route::get('/actionplans/{id}/delete','ActionplansController@delete');

Route::delete('/actionplans/{id}','ActionplansController@destroy');




Route::get('/goals','GoalsController@index');

Route::get('/goals/create','GoalsController@create');

Route::post('/goals','GoalsController@store');

Route::get('/goals/{subject}','GoalsController@show');

Route::get('/goals/{id}/edit','GoalsController@edit');

Route::put('/goals/{id}','GoalsController@update');

Route::get('goals/{id}/delete','GoalsController@delete');

Route::delete('/goals/{id}','GoalsController@destroy');


Route::get('/medicationslots','MedicationslotsController@index');

Route::get('/medicationslots/create','MedicationslotsController@create');

Route::post('/medicationslots','MedicationslotsController@store');

Route::get('/medicationslots/{subject}','MedicationslotsController@show');

Route::get('/medicationslots/{id}/edit','MedicationslotsController@edit');

Route::put('/medicationslots/{id}','MedicationslotsController@update');

Route::get('/medicationslots/{id}/delete','MedicationslotsController@delete');

Route::delete('/medicationslots/{id}','MedicationslotsController@destroy');


Route::get('/medicationnames','MedicationnamesController@index');

Route::get('/medicationnames/create','MedicationnamesController@create');

Route::post('/medicationnames','MedicationnamesController@store');

Route::get('/medicationnames/{id}','MedicationnamesController@show');


Route::get('/questions','QuestionsController@index');

Route::get('/questions/create','QuestionsController@create');

Route::post('/questions','QuestionsController@store');

Route::get('/questions/{id}','QuestionsController@show');

Route::get('/questions/{id}/edit','QuestionsController@edit');

Route::put('/questions/{id}','QuestionsController@update');

Route::get('/questions/{id}/delete','QuestionsController@delete');

Route::delete('/questions/{id}','QuestionsController@destroy');


Route:: get('/answers','AnswersController@index');

Route::get('/answers/create','AnswersController@create');

Route::post('/answers','AnswersController@store');

Route::get('/answers/{id}','AnswersController@show');

Route::get('/answers/{id}/edit','AnswersController@edit');

Route::put('/answers/{id}','AnswersController@update');

Route::get('/answers/{id}/delete','AnswersController@delete');

Route::delete('/answers/{id}','AnswersController@destroy');


Route::get('/reminders','RemindersController@index');

Route::get('/reminders/create','RemindersController@create');

Route::post('/reminders','RemindersController@store');

Route::get('/reminders/{id}','RemindersController@show');

Route::get('/reminders/{id}/edit','RemindersController@edit');

Route::put('/reminders/{id}','RemindersController@update');

Route::get('/reminders/{id}/delete','RemindersController@delete');

Route::delete('/reminders/{id}','RemindersController@destroy');

?>