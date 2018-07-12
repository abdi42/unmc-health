<?php
/**
 * Created by PhpStorm.
 * User: smakandar
 * Date: 7/11/2018
 * Time: 2:05 PM
 */
use App\Http\Controllers\HealthController;

\App\Http\Controllers\HealthController::index();

$url = "***REMOVED***";
$new_response = file_get_contents($url);
$response = json_decode($new_response);

for($i=0;$i<count($response->WeightDataList);$i++)
{
    if($response->WeightDataList[$i]->userid == $userid)
        {
    echo '<hr>';
    print_r("The details for Reading Number"."\x20".$i. "\x20". "are as follows:");
    echo '<br/>';
    print_r("Current Record Count is:\n")."\x20".print_r($response->CurrentRecordCount);
    echo '<br/>';
    print_r("Next Page URL is:\n")."\x20".print_r($response->NextPageUrl);
    echo '<br/>';
    print_r("Page Length is:\n")."\x20".print_r($response->PageLength);
    echo '<br/>';
    print_r("Page Number is:\n")."\x20".print_r($response->PageNumber);
    echo '<br/>';
    print_r("Previous Page URL is:\n")."\x20".print_r($response->PrevPageUrl);
    echo '<br/>';
    print_r("Record Count is:\n")."\x20".print_r($response->RecordCount);
    echo '<br/>';
    print_r("BMI value is:\n")."\x20".print_r($response->WeightDataList[$i]->BMI );
    echo '<br/>';
    print_r("BoneValue value is:\n")."\x20".print_r($response->WeightDataList[$i]->BoneValue);
    echo '<br/>';
    print_r("DCI value is:\n")."\x20".print_r($response->WeightDataList[$i]->DCI );
    echo '<br/>';
    print_r("DataID value is:\n")."\x20".print_r($response->WeightDataList[$i]->DataID);
    echo '<br/>';
    print_r("DataSource value is:\n")."\x20".print_r($response->WeightDataList[$i]->DataSource);
    echo '<br/>';
    print_r("FatValue value is:\n")."\x20".print_r($response->WeightDataList[$i]->FatValue);
    echo '<br/>';
    $latest_time = date("Y-m-d\TH:i:s\Z",$response->WeightDataList[$i]->LastChangeTime);
    print_r("LastChangeTime value is:\n")."\x20".print_r($latest_time);
    echo '<br/>';
    $mdate = date("Y-m-d\TH:i:s\Z",$response->WeightDataList[$i]->MDate);
    print_r("MDate value is:\n")."\x20".print_r($mdate);
    echo '<br/>';
    print_r("MuscaleValue is:\n")."\x20".print_r($response->WeightDataList[$i]->MuscaleValue);
    echo '<br/>';
    print_r("Note is:\n")."\x20".print_r($response->WeightDataList[$i]->Note);
    echo '<br/>';
    print_r("Timezone is:\n")."\x20".print_r($response->WeightDataList[$i]->TimeZone);
    echo '<br/>';
    print_r("VFR is:\n")."\x20".print_r($response->WeightDataList[$i]->VFR);
    echo '<br/>';
    print_r("WaterValue is:\n")."\x20".print_r($response->WeightDataList[$i]->WaterValue);
    echo '<br/>';
    print_r("WeightValue is:\n")."\x20".print_r($response->WeightDataList[$i]->WeightValue);
    echo '<br/>';
    print_r("Measurement time is:")."\x20".print_r($response->WeightDataList[$i]->measurement_time);
    echo '<br/>';
    print_r("Time Zone is:")."\x20".print_r($response->WeightDataList[$i]->time_zone);
    echo '<br/>';
    print_r("User ID:")."\x20".print_r($response->WeightDataList[$i]->userid);
    echo '<br/>';
    print_r("Weight Unit is:\n")."\x20".print_r($response->WeightUnit);
    echo '<br/>';
    }
}

/*
foreach($weights as $weight)
{
    if($weight->userid == $userid) {
        echo '<hr>';
        print_r("Current Record Count: ")."\x20".print_r($weight->CurrentRecordCount);
        echo '<br>';
        print_r("Next Page Url:")."\x20".print_r($weight->NextPageUrl);
        echo '<br>';
        print_r("PageLength:")."\x20".print_r($weight->PageLength);
        echo '<br>';
        print_r("PageNumber:")."\x20".print_r($weight->PageNumber);
        echo '<br>';
        print_r("PrevPageUrl: ")."\x20".print_r($weight->PrevPageUrl);
        echo '<br>';
        print_r("RecordCount: ")."\x20".print_r($weight->RecordCount);
        echo '<br>';
        print_r("BMI:")."\x20".print_r($weight->BMI);
        echo '<br>';
        print_r("BoneValue: ")."\x20".print_r($weight->BoneValue);
        echo '<br>';
        print_r("DCI: ")."\x20".print_r($weight->DCI);
        echo '<br>';
        print_r("DataID: ")."\x20".print_r($weight->DataID);
        echo '<br>';
        print_r("DataSource: ")."\x20".print_r($weight->DataSource);
        echo '<br>';
        print_r("FatValue: ")."\x20".print_r($weight->FatValue);
        echo '<br>';
        print_r("LastChangeTime: ")."\x20".print_r($weight->LastChangeTime);
        echo '<br>';
        print_r("FatValue: ")."\x20".print_r($weight->MDate);
        echo '<br>';
        print_r("MuscaleValue: ")."\x20".print_r($weight->MuscaleValue);
        echo '<br>';
        print_r("Note: ")."\x20".print_r($weight->Note);
        echo '<br>';
        print_r("TimeZone: ")."\x20".print_r($weight->TimeZone);
        echo '<br>';
        print_r("VFR: ")."\x20".print_r($weight->VFR);
        echo '<br>';
        print_r("WaterValue: ")."\x20".print_r($weight->WaterValue);
        echo '<br>';
        print_r("WeightValue: ")."\x20".print_r($weight->WeightValue);
        echo '<br>';
        print_r("measurement_time: ")."\x20".print_r($weight->measurement_time);
        echo '<br>';
        print_r("time_zone: ")."\x20".print_r($weight->time_zone);
        echo '<br>';
        print_r("User ID: ")."\x20".print_r($weight->userid);
        echo '<br>';
        print_r("WeightUnit: ")."\x20".print_r($weight->WeightUnit);
        echo '<br>';
    }
}
*/