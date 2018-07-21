<?php

namespace App\Http\Controllers;
use \App\Pulseoxygen;

use Illuminate\Http\Request;

class PulseoxygensController extends Controller
{
    public static function pulseoxinfo()
    {
        $url = "";
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
