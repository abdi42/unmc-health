<?php

use App\Subject;
use App\Reminder;
use App\Category;
use App\Content;
use App\Question;
use App\QuestionResult;
use App\Medicationslot;
use App\MedicationResponse;
use App\VirtualVisit;
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

// Get the next Hint for the subject, based on the ones they've already answered.
// This is a doosey.
Route::get('api/subjects/{subject}/nextHint',function(
    Request $request,
    Subject $subject
){
    // First, get a set of all questions that a subject has answered already.
    $answeredQuestions = [];
    foreach ($subject->questionResults as $question) {
        $answeredQuestions[] = $question->question_id;
    }

    $subjectDiseaseIds = [];
    // Do array map of subject disease STRINGS (!?!) to IDs.
    // This will be fixed when the IDs are based from the DATABASE.
    foreach (explode(",", $subject->disease_state) as $subjectDisease) {
        switch ($subjectDisease) {
            case 'HeartFailure':
                $subjectDiseaseIds[] = 1; // Heart
                break;
            case 'Diabetes':
                $subjectDiseaseIds[] = 2; //Diabetes
                break;
            case 'COPD':
                $subjectDiseaseIds[] = 3; // General(?)
                break;
            case 'Hypertension':
                $subjectDiseaseIds[] = 4;
                break;
        }
    }
    // Remove duplicates.
    $subjectDiseaseIds = array_unique($subjectDiseaseIds);

    // Get all content (hints) from the catories, as an array to use in a sec.
    $contentIds = Content::select('id')->whereIn('category_id',$subjectDiseaseIds)->pluck('id')->toArray();
    // Get a random question from the category types above.
    $question = Question::whereIn('content_id',$contentIds)->whereNotIn('id',$answeredQuestions)->inRandomOrder()->first();

    // Now, build the content answer, but only from the singulary randomized question up there.
    // Be sure to return nexted child data.
    $content = Content::where('id', $question->content_id)->whereHas('questions',function($query) use ($question){
        $query->where('id',$question->id);
        })
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


// Virtual Visits section
Route::get('api/virtualvisits/{subject}', function (Request $request, Subject $subject) {


    if ($subject) {
        $virtualvisits = $subject->virtualvisits;

        return $virtualvisits;
    } else {
        return response()->json(
            ['error' => 'Could not find subject with specified id' . $subject],
            404
        );
    }
});