<?php
/**
 * Created by PhpStorm.
 * User: smakandar
 * Date: 7/11/2018
 * Time: 2:05 PM
 */
use App\Http\Controllers\HealthController;

\App\Http\Controllers\HealthController::bpinfo();

$url_bp = "***REMOVED***";
$json_bp_details = file_get_contents($url_bp);
$response_bp =  json_decode($json_bp_details);

for($i=0;$i<count($response_bp->BPDataList);$i++)
{
    if($response_bp->BPDataList[$i]->userid == $userid)
        {
    echo '<hr>';

    print_r("BPL Value:") ."\x20". print_r($response_bp->BPDataList[$i]->BPL);
    echo '<br/>';
    print_r("Data ID value is:")."\x20".print_r($response_bp->BPDataList[$i]->DataID);
    echo '<br/>';
    print_r("DataSource value is:")."\x20".print_r($response_bp->BPDataList[$i]->DataSource);
    echo '<br/>';
    print_r("HP value is:")."\x20".print_r($response_bp->BPDataList[$i]->HP);
    echo '<br/>';
    print_r("HR value is:")."\x20".print_r($response_bp->BPDataList[$i]->HR);
    echo '<br/>';
    print_r("IsArr is:")."\x20".print_r($response_bp->BPDataList[$i]->IsArr);
    echo '<br/>';
    print_r("LP value is:")."\x20".print_r($response_bp->BPDataList[$i]->LP);
    echo '<br/>';
    $latest_time = date("Y-m-d\TH:i:s\Z",$response_bp->BPDataList[$i]->LastChangeTime);
    print_r("LastChangeTime is:")."\x20".print_r($latest_time);
    echo '<br/>';
    print_r("Lat is:")."\x20".print_r($response_bp->BPDataList[$i]->Lat);
    echo '<br/>';
    print_r("Lon is:")."\x20".print_r($response_bp->BPDataList[$i]->Lon);
    echo '<br/>';
    $mdate = date("Y-m-d\TH:i:s\Z",$response_bp->BPDataList[$i]->MDate);
    print_r("MDate is:")."\x20".print_r($mdate);
    echo '<br/>';
    print_r("Note is:")."\x20".print_r($response_bp->BPDataList[$i]->Note);
    echo '<br/>';
    print_r("TimeZone is:")."\x20".print_r($response_bp->BPDataList[$i]->TimeZone);
    echo '<br/>';
    print_r("User ID is")."\x20".print_r($response_bp->BPDataList[$i]->userid);
    echo '<br/>';
    print_r("BP Unit Value:") ."\x20". print_r($response_bp->BPUnit);
    echo '<br/>';
    print_r("Current Record Count:") ."\x20". print_r($response_bp->CurrentRecordCount);
    echo '<br/>';
    print_r("Next Page Url is:") ."\x20". print_r($response_bp->NextPageUrl);
    echo '<br/>';
    print_r("Prev Page Url is:") ."\x20". print_r($response_bp->PrevPageUrl);
    echo '<br/>';
    print_r("Record Count is:") ."\x20". print_r($response_bp->RecordCount);
    echo '<br/>';
}
}

/*
foreach($bps as $bp)
{
    if($bp->userid == $userid) {
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