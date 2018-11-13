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
            ['error' => 'Could not find subject ' . $request->subjectID],
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

Route::get('api/subjects/{subject}/getReminders', function (Request $request, Subject $subject) {
    // Check your input params.
    $default_days = 365;
    $days = $request->input('days', $default_days);
    if (!is_numeric($days)) {
        $days = $default_days;
    }

    // Array used for output
    $json_reminders = [];

    $timeSubjectEndNotificationsDateEndOfDay = strtotime($subject->enrollment_end_notifications_date) + 24*60*60 - 1;
    ///// Medicine Slot Scheduling for Reminders
    ///
    // Go set the next $days worth of reminders for med slots.
    $medication_reminders = [];
    foreach ($subject->medicationslots as $slot) {
        $timeparts = explode(":", $slot->medication_time);
        for ($d = 0; $d < $days; $d++) {
            // For the next $days days, set reminders for this slot, based on the day's name.

            $dtNextDayFromToday = mktime(0, 0, 0, date("m"), (date("j") + $d));
            $strNextDayFromTodaysDayName = strtolower(date("l", $dtNextDayFromToday));


            // If the date is past the subject's end notification date, don't send the date.
            if ($dtNextDayFromToday > $timeSubjectEndNotificationsDateEndOfDay) {
                continue;
            }

            // If the loop's next day is in the medication slot's day list
            if (stristr($slot->medication_day, $strNextDayFromTodaysDayName)) {
                // Add it to the master array with the slot's time.
                $reminderTime = mktime($timeparts[0], $timeparts[1], $timeparts[2], date("m", $dtNextDayFromToday), date("d", $dtNextDayFromToday), date("Y", $dtNextDayFromToday));
                // Using the day's unixtime as the array index, so we can collapse results.
                // If we want to do something with the meds for this slot, we need to add them.
                // If not, this loop isn't needed and could be replaced by a ++ or count() or ... nothing,
                // as long as it's adding the time as an index.
                foreach ($slot->medicines as $med) {
                    $medication_reminders[$reminderTime][] = $med;
                }
            }
        }
    }
    ksort($medication_reminders);

    foreach($medication_reminders as $time=>$medcines_at_this_time) {
        $json_reminders['medications'][] = [
            'medtime' => date("H:i",$time),
            'meddate' => date("m/d/Y",$time),
            'medcount' => count($medcines_at_this_time)
        ];
    }

    ///// Virtual Visit Reminders

    // Get today + $days
    // Don't forget to set the time to the end of the day...
    $datetimeReqParamDaysFromToday = date("Y-m-d H:i:s", mktime(23,59,59,date("m"),(date("d") + $days), date("Y")));
    $datetimeTodayStartsAt = date("Y-m-d 00:00:00");
    $datetimeEndNotifications = date("Y-m-d 23:59:59",$timeSubjectEndNotificationsDateEndOfDay);
    $endVVNotificationDate = min($datetimeReqParamDaysFromToday,$datetimeEndNotifications);
    $virtual_visit_reminders = VirtualVisit::where('date','>=',$datetimeTodayStartsAt)->where('date','<=',$endVVNotificationDate)->where('subject','=',$subject->subject)->orderBy('date')->get();

    $json_reminders['virtualvisits'] = [];
    foreach ($virtual_visit_reminders as $vv) {
        $json_reminders['virtualvisits'][] = [
            'vvtime' => date("H:i",strtotime($vv->date)),
            'vvdate' => date("m/d/Y",strtotime($vv->date)),
            'vvnotes' => $vv->notes,
            'vvurl' => $subject->virtual_visit_url
        ];
    }

    return response()->json($json_reminders);

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
Route::get('api/subjects/{subject}/nextHint', function (
    Request $request,
    Subject $subject
) {
    // First, get a set of all questions that a subject has answered already.
    $answeredQuestions = [];
    foreach ($subject->questionResults as $question) {
        $answeredQuestions[] = $question->question_id;
    }

    $subjectDiseaseIds = [];
    // Do array map of subject disease STRINGS (!?!) to IDs.
    // This will be fixed when the IDs are based from the DATABASE.
    if (strstr($subject->disease_state, ",")) {
        $categories = explode(",", $subject->disease_state);
    } else {
        $categories = [$subject->disease_state];
    }
    foreach ($categories as $subjectDisease) {
        switch ($subjectDisease) {
            case 'HeartFailure':
                $c = Category::where('category', 'Heart')->first();
                $subjectDiseaseIds[] = $c->id; // Heart
                break;
            case 'Diabetes':
                $c = Category::where('category', 'Diabetes')->first();
                $subjectDiseaseIds[] = $c->id; //Diabetes
                break;
            case 'COPD':
                $c = Category::where('category', 'General')->first();
                $subjectDiseaseIds[] = $c->id; // General(?)
                break;
            case 'Hypertension':
                $c = Category::where('category', 'Hypertension')->first();
                $subjectDiseaseIds[] = $c->id;
                break;
        }
    }
    // Remove duplicates.
    $subjectDiseaseIds = array_unique($subjectDiseaseIds);

    // Get all content (hints) from the catories, as an array to use in a sec.
    $contentIds = Content::select('id')
        ->whereIn('category_id', $subjectDiseaseIds)
        ->pluck('id')
        ->toArray();
    // Get a random question from the category types above.
    $question = Question::whereIn('content_id', $contentIds)
        ->whereNotIn('id', $answeredQuestions)
        ->inRandomOrder()
        ->with('answers')
        ->first();

    // Now, build the content answer, but only from the singulary randomized question up there.
    // Be sure to return nexted child data.
    $content = Content::where('id', $question->content_id)
        ->whereHas('questions', function ($query) use ($question) {
            $query->where('id', $question->id);
        })
        ->first();
    $content->question = $question;

    return $content;
});

Route::get('api/subjects/{subject}/checkupdates', function (
    Request $request,
    Subject $subject
) {
    $subject_last_updated = date("YmdHis", strtotime($subject->updated_at));

    // Get last medication update for this subject
    // Note- medication name touches medication slot, so that's covered.
    $last_med = Medicationslot::where('subject', $subject->subject)
        ->orderBy('updated_at', 'desc')
        ->first();
    if ($last_med) {
        $last_med_time = date("YmdHis", strtotime($last_med->updated_at));
    } else {
        $last_med_time = 0;
    }
    // Get last VV update date for this subject.
    $last_vv = \App\VirtualVisit::where('subject', $subject->subject)
        ->orderBy('updated_at', 'desc')
        ->first();
    if ($last_vv) {
        $last_vv_time = date("YmdHis", strtotime($last_vv->updated_at)) ?? '';
    } else {
        $last_vv_time = 0;
    }

    $data = [
        'subject' => $subject_last_updated,
        'medications' => $last_med_time,
        'virtualVisits' => $last_vv_time
    ];

    return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
});

// Virtual Visits section
Route::get('api/virtualvisits/{subject}', function (
    Request $request,
    Subject $subject
) {
    if ($subject) {
        $virtualvisits = $subject->virtualvisits;
        foreach ($virtualvisits as $k=>$virtualvisit) {
            $virtualvisits[$k]['virtual_visit_url'] = $subject->virtual_visit_url;
        }
        return $virtualvisits;
    } else {
        return response()->json(
            ['error' => 'Could not find subject with specified id' . $subject],
            404
        );
    }
});
