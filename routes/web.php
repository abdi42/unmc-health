<?php
use Illuminate\Support\Facades\DB;
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
//Route::get('subject-1/getweightinfo',['middleware' => 'auth', 'uses' => 'HealthController@index']);

//Route::get('getuserinfo',['middleware' => 'auth', 'email' => 'tim@example.com','uses' => 'HealthController@getuserinfo']);

Route::get('getuserinfo', 'HealthController@getuserinfo');


//Route::get('/displayuser','HealthController@displayuser');


Route::get('/musers/weight', function(){
    //dd($userid);
    //$musers = DB::table('musers')get();
    $musers = DB::table('musers')->get();
    $userid = DB::table('musers')->get();

    return view('displayuser',compact('musers','userid'));
});

Route::get('/musers/bp', function(){
    //dd($userid);
    //$musers = DB::table('musers')get();
    $musers = DB::table('musers')->get();
    $userid = DB::table('musers')->get();

    return view('bpshow',compact('musers','userid'));
});

Route::get('/musers/bg', function(){
    //dd($userid);
    //$musers = DB::table('musers')get();
    $musers = DB::table('musers')->get();
    $userid = DB::table('musers')->get();

    return view('bgshow',compact('musers','userid'));
});


Route::get('/musers/pulseox', function(){
    //dd($userid);
    //$musers = DB::table('musers')get();
    $musers = DB::table('musers')->get();
    $userid = DB::table('musers')->get();

    return view('pulseoxshow',compact('musers','userid'));
});


/*
Route::get('/musers/{userid}', function($userid){
    //dd($userid);
    //$musers = DB::table('musers')get();
    $musers = DB::table('musers')->get();

    return view('displayuser',compact('musers','userid'));
});
*/
Route::get('/weights/{userid}',function($userid)
{
    $weights = DB::table('weights')->get();

    return view('/displayweight',compact('weights','userid'));
});

Route::get('/bps/{userid}',function($userid)
{
    $bps = DB::table('bps')->get();

    return view('/displaybp',compact('bps','userid'));
});

Route::get('/bgs/{userid}',function($userid)
{
    $bgs = DB::table('bgs')->get();

    return view('/displaybg',compact('bgs','userid'));
});

Route::get('/pulseox/{userid}',function($userid)
{
    $pulse = DB::table('pulseoxes')->get();

    return view('/displaypulseox',compact('pulse','userid'));
});




