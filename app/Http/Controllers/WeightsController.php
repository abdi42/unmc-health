<?php

namespace App\Http\Controllers;
use \App\Weight;
use \App\Subject;

use Illuminate\Http\Request;

class WeightsController extends Controller
{
    public static function index()
    {
        $url = "https://api.ihealthlabs.com:8443/openapiv2/application/weight.json/?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=https%3A%2F%2Fmhealth.dev.attic.uno%2F%3Fthis%3Dthat&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qRDfiA-*1Q8TQ1oUgFqKv6xAEPvQ6Sahm10GsdYOZ*HZrNBkuq5AA-qo*lABQdjjpDTUPPDhLzOVawpwKdKVb6iLa*GZDxd2dm1-JCIyTr-m0EuFvBkcYRBFr3zNK9Whew&sc=f1510e5e64454e3c9f1114c859349fc4&sv=1ee677093af84ca8a4548ae7ba701ddb";
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
