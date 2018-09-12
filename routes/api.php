<?php


use App\Subject;
use App\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('api/subjects/authenticate',function(Request $request){
    $subject = Subject::findOrFail($request->subjectID);
    
    if($subject == null)
    {
      return response()->json(['error'=> 'Could not find subject '.$subjectID],404);
    } else if(Hash::check($request->pin,$subject->pin) == false) {
      return response()->json(['error'=> 'Incorrect pin'],401);
    }


    return response()->json($subject);
});


Route::get('api/reminders/{subject}', function($code){
    $subject = Reminder::where("subject","=",$code)->first();


    if($subject == null)
    {
        return response()->json(['error'=> 'Could not find module'.$code],404);
    }
    return response()->json($subject);
}

);
