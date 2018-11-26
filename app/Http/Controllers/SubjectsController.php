<?php

namespace App\Http\Controllers;

use App\Bloodglucose;
use App\Bloodpressure;
use App\Subject;
use App\Pulseoxygen;
use App\Medicationslot;
use App\Medicationname;
use App\Weight;
use App\Services\iHealth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\QuestionResult;
use App\MedicationResponse;

class SubjectsController extends Controller
{
    protected $ihealthService;

    public function __construct(iHealth $ihealth)
    {
        $this->ihealthService = $ihealth;
    }

    public static function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $subject = Subject::all();
        return view('subjects.create', compact('subject'));
    }

    public function store(Request $request)
    {
        session(['newUser' => true]);

        $this->validate($request, [
            'id' => 'required',
            'pin' => 'required',
            'group_type' => 'required'
        ]);

        try {
            $subject = new Subject();
            $subject->subject = $request->input('id');
            $subject->pin = bcrypt($request->input('pin'));
            $subject->disease_state = implode(",", $request->input('disease'));
            $subject->enrollmentdate = $request->input('enrollmentdate');
            $subject->enrollment_end_notifications_date = $request->input(
                'enrollment_end_notifications_date'
            );
            $subject->enrollment_end_date = $request->input(
                'enrollment_end_date'
            );
            $subject->group_type = $request->input('group_type');

            $subject->save();
        } catch (\Illuminate\Database\QueryException $e) {
            $sqlState = $e->errorInfo[0];
            $errorCode = $e->errorInfo[1];
            if ($sqlState == "23000" && $errorCode == 1062) {
                return redirect('/subjects/create');
            }
        }

        return redirect(
            '/subjects/' . $subject->subject . '/medicationslots/create'
        )->with('status', 'Created new subject ' . $subject->subject);
    }

    public function message()
    {
        return view('subjects.message');
    }

    public function show($subject)
    {
        $subject = Subject::with('medicationslots.medicines')->find($subject);

        return view('subjects.show', compact('subject'));
    }

    public function edit($subject)
    {
        $subject = Subject::all()->find($subject);

        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, $subject)
    {
        //        $this->validate($request, [
        //            'pin' => 'required'
        //        ]);

        $subject = Subject::all()->find($subject);
        $subject->subject = $request->input('id');
        $subject->userid = $request->input('userid');
        if ($request->input('pin') != '') {
            $subject->pin = bcrypt($request->input('pin'));
        }
        $subject->disease_state = implode(",", $request->input('disease'));
        $subject->virtualvisit = $request->input('virtualvisit');
        $subject->enrollmentdate = $request->input('enrollmentdate');
        $subject->enrollment_end_notifications_date = $request->input(
            'enrollment_end_notifications_date'
        );
        $subject->enrollment_end_date = $request->input('enrollment_end_date');
        $subject->group_type = $request->input('group_type');

        $subject->save();

        return redirect('/subjects');
    }

    public function delete($id)
    {
        $subject = Subject::all()->find($id);

        return view('subjects.delete', compact('subject'));
    }

    public function destroy($id)
    {
        $subject = Subject::all()->find($id);
        $subject->delete();
        session()->flash('message', 'Deleted Successfully');
        return redirect('/subjects');
    }

    public function handleOAuthRedirect(Request $request)
    {
        $subject = Subject::findorFail($request->query('subject_code'));
        $subject->registration_token = $request->query('code');

        $subject->save();
    }

    public function authorize_subject(Request $request)
    {
        $subject = Subject::findOrFail($request->query('subject_code'));
        $code = $request->query('code');

        $body = $this->ihealthService->getNewToken($subject, $code);

        $subject->access_token = $body->AccessToken;
        $subject->refresh_token = $body->RefreshToken;
        $subject->expires_in = Carbon::now()
            ->addSecond($body->Expires)
            ->toDateTimeString();
        $subject->userid = $body->UserID;

        $subject->save();

        return view('auth.oauth');
    }

    public function webhook(Request $request)
    {
        Log::debug('An informational message.');
        Log::debug(json_encode($request->json()));
        return response()->json(['success' => 'success'], 200);
    }

    public function getReminders(Subject $subject, Request $request)
    {
        $virtualVisits = $subject->virtualVisits;
        return view('subjects.reminders', [
            'subjectId' => $subject->subject,
            'virtualVisits' => $virtualVisits,
            'subject' => $subject
        ]);
    }

    public function ihealthPrompt(Subject $subject, Request $request)
    {
        $request->session()->forget('newUser');
        return view('subjects.ihealth_prompt', [
            'subjectId' => $subject->subject
        ]);
    }

    public function showMedicationResponses($subject, Request $request)
    {
        $subject = Subject::with('medicationslots.medicines.responses')->find(
            $subject
        );

        $medications = collect($subject->medicationslots)
            ->pluck('medicines')
            ->flatten();

        return view('medication_responses.index', [
            'medications' => $medications,
            'subjectId' => $subject->subject
        ]);
    }

    public function getWeeklyProgress(Subject $subject, Request $request)
    {
        $fromDate = Carbon::now()
            ->subWeek(1)
            ->startOfWeek();
        $toDate = Carbon::now()
            ->subWeek(1)
            ->endOfWeek();
        $questionResults = QuestionResult::where(
            'subject_id',
            $subject->subject
        )
            ->whereBetween('time', [$fromDate, $toDate])
            ->get();
        $medicationResults = MedicationResponse::where(
            'subject_id',
            $subject->subject
        )
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->get();
        $questionResultsByWeek = $questionResults->groupBy(function ($date) {
            return Carbon::parse($date->time)->format('m/d');
        });
        $medicationResultsByWeek = $medicationResults->groupBy(function (
            $date
        ) {
            return Carbon::parse($date->created_at)->format('m/d');
        });
        $weights = $this->ihealthService->getHealthData(
            'user/' . $subject->userid . '/weight.json',
            getenv('SC_WEIGHT'),
            getenv('SV_WEIGHT'),
            $subject->access_token,
            $fromDate->timestamp,
            $toDate->timestamp
        );
        $weightsByWeek = collect($weights->WeightDataList)->groupBy(function (
            $date
        ) {
            return Carbon::parse($date->measurement_time)->format('m/d');
        });
        $bloodPressure = $this->ihealthService->getHealthData(
            'user/' . $subject->userid . '/bp.json',
            getenv('SC_BP'),
            getenv('SV_BP'),
            $subject->access_token,
            $fromDate->timestamp,
            $toDate->timestamp
        );
        $bloodPressureByWeek = collect($bloodPressure->BPDataList)->groupBy(
            function ($date) {
                return Carbon::parse($date->measurement_time)->format('m/d');
            }
        );
        $pulseOxygen = $this->ihealthService->getHealthData(
            'user/' . $subject->userid . '/spo2.json',
            getenv('SC_SPO2'),
            getenv('SV_SPO2'),
            $subject->access_token,
            $fromDate->timestamp,
            $toDate->timestamp
        );
        $pulseOxygenByWeek = collect($pulseOxygen->BODataList)->groupBy(
            function ($date) {
                return Carbon::parse($date->measurement_time)->format('m/d');
            }
        );
        $bloodGlucose = $this->ihealthService->getHealthData(
            'user/' . $subject->userid . '/glucose.json',
            getenv('SC_BG'),
            getenv('SV_BG'),
            $subject->access_token,
            $fromDate->timestamp,
            $toDate->timestamp
        );
        $bloodGlucoseByWeek = collect($bloodGlucose->BGDataList)->groupBy(
            function ($date) {
                return Carbon::parse($date->measurement_time)->format('m/d');
            }
        );
        return response()->json([
            "hints" => [
                "count" => count($questionResults),
                "data" => $questionResultsByWeek
            ],
            "medicationresponse" => [
                "count" => count($medicationResults),
                "data" => $medicationResultsByWeek
            ],
            "weights" => [
                "count" => $weights->RecordCount,
                "data" => $weightsByWeek
            ],
            "bloodpressure" => [
                "count" => $bloodPressure->RecordCount,
                "data" => $bloodPressureByWeek
            ],
            "bloodglucose" => [
                "count" => $bloodGlucose->RecordCount,
                "data" => $bloodGlucoseByWeek
            ],
            "pulseoxygen" => [
                "count" => $pulseOxygen->RecordCount,
                "data" => $pulseOxygenByWeek
            ]
        ]);
    }
}
