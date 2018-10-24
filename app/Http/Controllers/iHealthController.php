<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\iHealth;
use App\Subject;

class iHealthController extends Controller
{

    protected $ihealthService;

    public function __construct(iHealth $ihealth)
    {
        $this->ihealthService = $ihealth;
    }


    public function show_weight(Subject $subject)
    {

        $data = collect($this->ihealthService->weights($subject->userid, $subject->access_token)->WeightDataList);

        $weightValues = $data->map(function ($weight) {
            return round($weight->WeightValue * 2.2046);
        });

        $dates = $data->map(function ($weight) {
            return Carbon::parse($weight->measurement_time)->format('M d,  h:i a');
        });


        return view('weights.index', [
            "subjectId" => $subject->subject,
            "weightValues" => $weightValues,
            "dates" => $dates,
            "data" => $data,
        ]);
    }


    public function show_bloodpressure(Subject $subject)
    {
        $data = collect($this->ihealthService->bloodPressure($subject->userid, $subject->access_token)->BPDataList);

        $values = $data->map(function ($value) {
            return round($value->HR);
        });

        $dates = $data->map(function ($value) {
            return Carbon::parse($value->measurement_time)->format('M d,  h:i a');
        });


        return view('bloodpressures.index', [
            "subjectId" => $subject->subject,
            "values" => $values,
            "dates" => $dates,
            "data" => $data,
        ]);
    }


    public function show_bloodglucose(Subject $subject)
    {
        $data = collect($this->ihealthService->bloodGlucose($subject->userid, $subject->access_token)->BGDataList);

        $values = $data->map(function ($value) {
            return round($value->BG);
        });

        $dates = $data->map(function ($value) {
            return Carbon::parse($value->measurement_time)->format('M d,  h:i a');
        });

        return view('bloodglucoses.index', [
            "subjectId" => $subject->subject,
            "values" => $values,
            "dates" => $dates,
            "data" => $data,
        ]);
    }


    public function show_pulseoxygen(Subject $subject)
    {

        $data = collect($this->ihealthService->pulseOxygen($subject->userid, $subject->access_token)->BODataList);

        $values = $data->map(function ($value) {
            return round($value->BO);
        });

        $dates = $data->map(function ($value) {
            return Carbon::parse($value->measurement_time)->format('M d,  h:i a');
        });


        return view('pulseoxygens.index', [
            "subjectId" => $subject->subject,
            "values" => $values,
            "dates" => $dates,
            "data" => $data,
        ]);
    }


}
