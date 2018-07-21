<?php

namespace App\Http\Controllers;
use \App\Bloodglucose;

use Illuminate\Http\Request;

class BloodglucosesController extends Controller
{
    public static function bginfo()
    {
        $url = "";
        $json_bg_details = file_get_contents($url);
        $response_bg = json_decode($json_bg_details);


        for($i=0;$i<count($response_bg->BGDataList);$i++) {
            $ids = Bloodglucose::all()->pluck('id');

            $bg = new Bloodglucose();

            if ($ids->count() >= $response_bg->CurrentRecordCount) {
                break;
            }

            $bg->BG = $response_bg->BGDataList[$i]->BG;
            $bg->DataID = $response_bg->BGDataList[$i]->DataID;
            $bg->DataSource = $response_bg->BGDataList[$i]->DataSource;
            $bg->DinnerSituation = $response_bg->BGDataList[$i]->DinnerSituation;
            $bg->DrugSituation = $response_bg->BGDataList[$i]->DrugSituation;
            $latest_time = date("Y-m-d", $response_bg->BGDataList[$i]->LastChangeTime);
            $bg->LastChangeTime = $latest_time;
            $bg->Lat = $response_bg->BGDataList[$i]->Lat;
            $bg->Lon = $response_bg->BGDataList[$i]->Lon;
            $mdate = date("Y-m-d", $response_bg->BGDataList[$i]->MDate);
            $bg->MDate = $mdate;
            $bg->Note = $response_bg->BGDataList[$i]->Note;
            $bg->TimeZone = $response_bg->BGDataList[$i]->TimeZone;
            $bg->userid = $response_bg->BGDataList[$i]->userid;
            $bg->BGUnit = $response_bg->BGUnit;
            $bg->CurrentRecordCount = $response_bg->CurrentRecordCount;
            $bg->NextPageUrl = $response_bg->NextPageUrl;
            $bg->PageLength = $response_bg->PageLength;
            $bg->PageNumber = $response_bg->PageNumber;
            $bg->PrevPageUrl = $response_bg->PrevPageUrl;
            $bg->RecordCount = $response_bg->RecordCount;
            $bg->save();
        }



    }
}
