<?php

use Validator;
use App\Subject;
use App\Reminder;
use App\Category;
use App\Content;
use App\Question;
use App\Medicationslot;
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
});

Route::get('api/medications/{subject}',function($code) {
    $subject = Subject::find($code);
    
    if($subject){
        $slots = Medicationslot::where("subject","=",$code)->with('medicines')->get();
        return response()->json(['schedule' => $slots]);
    }
    else {
        return response()->json(['error' => 'Could not find subject with specified id' . $code],404);
    }
});

Route::put('api/medications/{subject}',function($code) {
    $subject = Subject::find($code);
    
    if($subject){
        return response()->json(['messages'=>'Success! updated subject']);
    }
    else {
        return response()->json(['error' => 'Could not find subject with specified id' . $code],404);
    }
});

Route::post('api/content',function(Request $request) {

  $validator = Validator::make($request->all(), [
    'subjectId' => 'required|exists:subjects,subject',
    'questionId' => 'required|exists:questions,id',
    'attempts' => 'required',
    'time' => 'required'
  ]);

  if ($validator->fails()) {
    return response()->json(['error' => $validator->errors()],404);
  }

  $subject = Subject::find($request->subjectId);
  $question = Question::find($request->questionId);

  return response()->json(['messages'=>'Saved subject attempts']);

});

Route::get('api/content/{categoryname}',function(Request $request,$categoryname){
    $exclude = explode(',', $request->query('exclude'));

    $category = Category::where('category','=',$categoryname)->first();
    $content = Content::where('category_id',$category->id)->whereNotIn('id',$exclude)->with('questions.answers')->inRandomOrder()->first();

    return $content;
});
