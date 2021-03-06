<?php

namespace App\Http\Controllers;
use \App\Bloodpressure;

use Illuminate\Http\Request;

class BloodpressuresController extends Controller
{
    public static function bpinfo()
    {
        $client_id = getenv('CLIENT_ID');
        $client_secret = getenv('CLIENT_SECRET');
        $redirect_uri = getenv('REDIRECT_URI');
        $access_token = getenv('ACCESS_TOKEN');
        $sc_bp = getenv('SC_BP');
        $sv_bp = getenv('SV_BP');


        $url_bp = "https://api.ihealthlabs.com:8443/openapiv2/application/bp.json/?client_id=".$client_id."&client_secret=".$client_secret."&redirect_uri=".$redirect_uri."&access_token=".$access_token."&sc=".$sc_bp."&sv=".$sv_bp;
        $json_bp_details = file_get_contents($url_bp);
        $response_bp =  json_decode($json_bp_details);


        for ($i = 0; $i < count($response_bp->BPDataList); $i++) {

            $ids = Bloodpressure::all()->pluck('id');

            $bp = new Bloodpressure;

            if ($ids->count() >= $response_bp->CurrentRecordCount) {
                break;
            }
            else
            {

                $bp->BPL = $response_bp->BPDataList[$i]->BPL;
                $bp->DataID = $response_bp->BPDataList[$i]->DataID;
                $bp->DataSource = $response_bp->BPDataList[$i]->DataSource;
                $bp->HP = $response_bp->BPDataList[$i]->HP;
                $bp->HR = $response_bp->BPDataList[$i]->HR;
                $bp->IsArr = $response_bp->BPDataList[$i]->IsArr;
                $bp->LP = $response_bp->BPDataList[$i]->LP;
                $latest_time = date("Y-m-d", $response_bp->BPDataList[$i]->LastChangeTime);
                $bp->LastChangeTime = $latest_time;
                $bp->Lat = $response_bp->BPDataList[$i]->Lat;
                $bp->Lon = $response_bp->BPDataList[$i]->Lon;
                $mdate = date("Y-m-d", $response_bp->BPDataList[$i]->MDate);
                $bp->MDate = $mdate;
                $bp->Note = $response_bp->BPDataList[$i]->Note;
                $bp->TimeZone = $response_bp->BPDataList[$i]->TimeZone;
                $bp->userid = $response_bp->BPDataList[$i]->userid;
                $bp->BPUnit = $response_bp->BPUnit;
                $bp->CurrentRecordCount = $response_bp->CurrentRecordCount;
                $bp->NextPageUrl = $response_bp->NextPageUrl;
                $bp->PageLength = $response_bp->PageLength;
                $bp->PageNumber = $response_bp->PageNumber;
                $bp->PrevPageUrl = $response_bp->PrevPageUrl;
                $bp->RecordCount = $response_bp->RecordCount;
                $bp->save();
            }

        }

    return view('bloodpressures.show',compact('response_bp'));

    }

}
