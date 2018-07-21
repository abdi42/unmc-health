@extends('layouts.master')

<!doctype html>
<html>
<title>Blood Pressure List</title>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: smakandar
 * Date: 7/11/2018
 * Time: 2:05 PM
 */
use App\Http\Controllers\BloodpressuresController;

BloodpressuresController::bpinfo();

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
?>
