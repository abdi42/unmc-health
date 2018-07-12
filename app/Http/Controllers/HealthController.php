<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;



class HealthController extends Controller
{


    public static function index()
    {
        $url = "***REMOVED***";
        $new_response = file_get_contents($url);
        $response = json_decode($new_response);


        for ($i = 0; $i < count($response->WeightDataList); $i++) {

            $ids = \App\Weight::all()->pluck('id');

            $weight = new \App\Weight;
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

            return view('/displayweight', compact('response'));
        }




    public static function getuserinfo()
    {
       ***REMOVED***                                                                                                      // Enter the URL to fetch the User Profile of all users
        $json = file_get_contents($url);                                                                                // Read the details of the file in the form of a String
        $response_user = json_decode($json);

        for ($i = 0; $i < count($response_user->UserInfoList); $i++) {
            $muser = new \App\Muser;
            $muser->userid = $response_user->UserInfoList[$i]->userid;

            $muser->save();


        }
        return view('/userlist',compact('response_user'));
    }

    public function displayuser()
    {
        $users = DB::table('musers')->get();

        return view('displayuser', compact('users'));
    }




    public static function bpinfo()
    {
       ***REMOVED***
        $json_bp_details = file_get_contents($url_bp);
        $response_bp =  json_decode($json_bp_details);


        for ($i = 0; $i < count($response_bp->BPDataList); $i++) {

            $ids = \App\bp::all()->pluck('id');

            $bp = new \App\bp;

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


        return view('profile.bplist', compact('response_bp'));

    }


    public static function bginfo()
    {
       ***REMOVED***
        $json_bg_details = file_get_contents($url);
        $response_bg = json_decode($json_bg_details);


        for($i=0;$i<count($response_bg->BGDataList);$i++) {
            $ids = \App\bg::all()->pluck('id');

            $bg = new \App\bg();

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

        return view('profile.bglist',compact('response_bg'));


    }



    public static function pulseoxinfo()
    {
      ***REMOVED***
        $json_pulseox_details = file_get_contents($url);
        $response_pulseox = json_decode($json_pulseox_details);

        for($i=0;$i<count($response_pulseox->BODataList);$i++)
        {
            $ids = \App\Pulseoxe::all()->pluck('id');

            $pulse = new \App\Pulseoxe();

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

        return view('profile.pulselist', compact('response_pulseox'));

    }



    }
