<?php

namespace App\Http\Controllers;
use \App\Weight;
use \App\Subject;

use Illuminate\Http\Request;

class WeightsController extends Controller
{
    public static function index()
    {
        $client_id = getenv('CLIENT_ID');
        $client_secret = getenv('CLIENT_SECRET');
        $redirect_uri = getenv('REDIRECT_URI');
        $access_token = getenv('ACCESS_TOKEN');
        $sc_weight = getenv('SC_WEIGHT');
        $sv_weight = getenv('SV_WEIGHT');



        $url = "https://api.ihealthlabs.com:8443/openapiv2/application/weight.json/?client_id=".$client_id."&client_secret=".$client_secret."&redirect_uri=".$redirect_uri."&access_token=".$access_token."&sc=".$sc_weight."&sv=".$sv_weight;
        $new_response = file_get_contents($url);
        $response = json_decode($new_response);
        $userid = Subject::all();

        for ($i = 0; $i < count($response->WeightDataList); $i++) {

            $ids = Weight::all()->pluck('id');

            $weight = new Weight;
            if($ids->count() >= $response->CurrentRecordCount)
            {
                break;
            }
            else {

                $weight->CurrentRecordCount = $response->CurrentRecordCount;
                $weight->NextPageUrl = $response->NextPageUrl;
                $weight->PageLength = $response->PageLength;
                $weight->PageNumber = $response->PageNumber;
                $weight->PrevPageUrl = $response->PrevPageUrl;
                $weight->RecordCount = $response->RecordCount;
                $weight->BMI = $response->WeightDataList[$i]->BMI;
                $weight->BoneValue = $response->WeightDataList[$i]->BoneValue;
                $weight->DCI = $response->WeightDataList[$i]->DCI;
                $weight->DataID = $response->WeightDataList[$i]->DataID;
                $weight->DataSource = $response->WeightDataList[$i]->DataSource;
                $weight->FatValue = $response->WeightDataList[$i]->FatValue;
                $latest_time = date("Y-m-d", $response->WeightDataList[$i]->LastChangeTime);
                $weight->LastChangeTime = $latest_time;
                $mdate = date("Y-m-d", $response->WeightDataList[$i]->MDate);
                $weight->MDate = $mdate;
                $weight->MuscaleValue = $response->WeightDataList[$i]->MuscaleValue;
                $weight->Note = $response->WeightDataList[$i]->Note;
                $weight->TimeZone = $response->WeightDataList[$i]->TimeZone;
                $weight->VFR = $response->WeightDataList[$i]->VFR;
                $weight->WaterValue = $response->WeightDataList[$i]->WaterValue;
                $weight->WeightValue = $response->WeightDataList[$i]->WeightValue;
                $weight->measurement_time = $response->WeightDataList[$i]->measurement_time;
                $weight->time_zone = $response->WeightDataList[$i]->time_zone;
                $weight->userid = $response->WeightDataList[$i]->userid;
                $weight->WeightUnit = $response->WeightUnit;
                $weight->save();
            }

        }

    }


}
