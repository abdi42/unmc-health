<?php

namespace App\Http\Controllers;
use \App\Pulseoxygen;

use Illuminate\Http\Request;

class PulseoxygensController extends Controller
{
    public static function pulseoxinfo()
    {
        $client_id = getenv('CLIENT_ID');
        $client_secret = getenv('CLIENT_SECRET');
        $redirect_uri = getenv('REDIRECT_URI');
        $access_token = getenv('ACCESS_TOKEN');
        $sc_spo2 = getenv('SC_SPO2');
        $sv_spo2 = getenv('SV_SPO2');


        $url = "https://api.ihealthlabs.com:8443/openapiv2/application/spo2.json/?client_id=".$client_id."&client_secret=".$client_secret."&redirect_uri=".$redirect_uri."&access_token=".$access_token."&sc=".$sc_spo2."&sv=".$sv_spo2;
        $json_pulseox_details = file_get_contents($url);
        $response_pulseox = json_decode($json_pulseox_details);

        for($i=0;$i<count($response_pulseox->BODataList);$i++)
        {
            $ids = Pulseoxygen::all()->pluck('id');

            $pulse = new Pulseoxygen();

            if ($ids->count() >= $response_pulseox->CurrentRecordCount) {
                break;
            }
            else
            {
                $pulse->BO = $response_pulseox->BODataList[$i]->BO;
                $pulse->DataID = $response_pulseox->BODataList[$i]->DataID;
                $pulse->DataSource = $response_pulseox->BODataList[$i]->DataSource;
                $pulse->HR = $response_pulseox->BODataList[$i]->HR;
                $latest_time = date("Y-m-d", $response_pulseox->BODataList[$i]->LastChangeTime);
                $pulse->LastChangeTime = $latest_time;
                $pulse->Lat = $response_pulseox->BODataList[$i]->Lat;
                $pulse->Lon = $response_pulseox->BODataList[$i]->Lon;
                $mdate = date("Y-m-d", $response_pulseox->BODataList[$i]->MDate);
                $pulse->MDate = $mdate;
                $pulse->TimeZone = $response_pulseox->BODataList[$i]->TimeZone;
                $pulse->userid = $response_pulseox->BODataList[$i]->userid;
                $pulse->CurrentRecordCount = $response_pulseox->CurrentRecordCount;
                $pulse->NextPageUrl = $response_pulseox->NextPageUrl;
                $pulse->PageLength = $response_pulseox->PageLength;
                $pulse->PageNumber = $response_pulseox->PageNumber;
                $pulse->PrevPageUrl = $response_pulseox->PrevPageUrl;
                $pulse->RecordCount = $response_pulseox->RecordCount;
                $pulse->save();
            }
        }


    }

}
