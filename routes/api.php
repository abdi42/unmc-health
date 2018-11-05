<?php

use App\Subject;
use App\Reminder;
use App\Category;
use App\Content;
use App\Question;
use App\QuestionResult;
use App\Medicationslot;
use App\MedicationResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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

Route::post('api/subjects/authenticate', function (Request $request) {
    $subject = Subject::findOrFail($request->subjectID);

    if ($subject == null) {
        return response()->json(
            ['error' => 'Could not find subject ' . $subjectID],
            404
        );
    } elseif (Hash::check($request->pin, $subject->pin) == false) {
        return response()->json(['error' => 'Incorrect pin'], 401);
    }

    return response()->json($subject);
});

Route::get('api/reminders/{subject}', function ($code) {
    $subject = Reminder::where("subject", "=", $code)->first();

    if ($subject == null) {
        return response()->json(
            ['error' => 'Could not find module' . $code],
            404
        );
    }
    return response()->json($subject);
});

Route::get('api/medications/{subject}', function ($code) {
    $subject = Subject::find($code);

    if ($subject) {
        $slots = Medicationslot::where("subject", "=", $code)
            ->with('medicines')
            ->get();
        return response()->json(['schedule' => $slots]);
    } else {
        return response()->json(
            ['error' => 'Could not find subject with specified id' . $code],
            404
        );
    }
});

Route::put('api/medications/{subject}', function (
    Request $request,
    Subject $subject
) {
    if (!$subject) {
        return response()->json(
            ['error' => 'Could not find subject with specified id' . $code],
            404
        );
    }

    foreach ($request->slots as $slot) {
    }
});

Route::post('api/content', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'subjectId' => 'required|exists:subjects,subject',
        'questionId' => 'required|exists:questions,id',
        'attempts' => 'required',
        'time' => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 404);
    }

    $subject = Subject::find($request->subjectId);
    $question = Question::find($request->questionId);

    $result = new QuestionResult();
    $result->question_id = $question->id;
    $result->subject_id = $subject->subject;
    $result->attempts = $request->attempts;
    $result->time = Carbon::createFromTimestampMs(
        $request->time,
        'US/Central'
    )->toDateTimeString();
    $result->save();

    return response()->json($result);

    return response()->json(['messages' => 'Saved subject attempts']);
});

Route::get('api/content/{categoryname}', function (
    Request $request,
    $categoryname
) {
    if ($categoryname == "HeartFailure") {
        $categoryname = "Heart";
    } elseif ($categoryname == "COPD") {
        $categoryname = "General";
    }

    $exclude = explode(',', $request->query('exclude'));

    $category = Category::where('category', '=', $categoryname)->first();
    $content = Content::where('category_id', $category->id)
        ->whereNotIn('id', $exclude)
        ->with('questions.answers')
        ->inRandomOrder()
        ->first();

    return $content;
});

Route::get('api/subjects/{subject}/checkupdates',function(
    Request $request, Subject $subject
){
    $subject_last_updated = date("YmdHis",strtotime($subject->updated_at));

    // Get last medication update for this subject
    // Note- medication name touches medication slot, so that's covered.
    $last_med = Medicationslot::where('subject',$subject->subject)->orderBy('updated_at','desc')->first();
    if ($last_med) {
        $last_med_time = date("YmdHis", strtotime($last_med->updated_at));
    } else {
        $last_med_time = 0;
    }
    // Get last VV update date for this subject.
    $last_vv = \App\VirtualVisit::where('subject',$subject->subject)->orderBy('updated_at','desc')->first();
    if ($last_vv) {
        $last_vv_time = date("YmdHis", strtotime($last_vv->updated_at)) ?? '';
    } else {
        $last_vv_time = 0;
    }

    $data = [
        'subject' => $subject_last_updated,
        'medications' => $last_med_time,
        'virtualVisits' => $last_vv_time,
    ];

    return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
});
