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

Route::resource('/admin', 'AdminController');

/* Logout Route */
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/* Page after the authenticated user is signed in (Dashboard Page)*/
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('subjects', 'SubjectsController');

Route::resource('contents', 'ContentsController');

Route::resource('categories', 'CategoriesController');

Route::resource('tips', 'TipsController');

Route::resource('actionplans', 'ActionplansController');

Route::resource('medicationslots', 'MedicationslotsController');

Route::resource('reminders', 'RemindersController');

Route::group(['middleware' => ['CheckAccessToken']], function () {
    // Ihealth Data
    Route::get('/subjects/{subject}/weights', 'iHealthController@show_weight');

    Route::get(
        '/subjects/{subject}/bloodpressures',
        'iHealthController@show_bloodpressure'
    );

    Route::get(
        '/subjects/{subject}/bloodglucoses',
        'iHealthController@show_bloodglucose'
    );

    Route::get(
        '/subjects/{subject}/pulseoxygens',
        'iHealthController@show_pulseoxygen'
    );
});

//Medication Slots & Names

Route::get(
    '/subjects/{subject}/medicationslots',
    'MedicationslotsController@index'
);

Route::get(
    '/subjects/{subject}/medicationslots/create',
    'MedicationslotsController@create'
);

Route::post(
    '/subjects/{subject_id}/medicationslots',
    'MedicationslotsController@store'
);

Route::put(
    '/subjects/{subject}/medicationslots',
    'MedicationslotsController@update'
);

Route::get(
    '/subjects/{subject}/questions-results',
    'QuestionResultsController'
);

//Virtual Visit

Route::get('/subjects/{subject}/virtualvisits', 'VirtualVisitController@index');
Route::get(
    '/subjects/{subject}/virtualvisits/create',
    'VirtualVisitController@create'
);

Route::post(
    '/subjects/{subject}/virtualvisits',
    'VirtualVisitController@store'
);

Route::put(
    '/subjects/{subject}/virtualvisits',
    'VirtualVisitController@update'
);

Route::get('/subjects/{subject}/reminders', 'SubjectsController@getReminders');

Route::get(
    '/subjects/{subject}/ihealthprompt',
    'SubjectsController@ihealthPrompt'
);

Route::get(
    '/subjects/{subject}/medicationresponses',
    'SubjectsController@showMedicationResponses'
);

Route::get('/ihealth/callback', 'SubjectsController@authorize_subject');
Route::get('/webhook', 'SubjectsController@webhook');
?>
