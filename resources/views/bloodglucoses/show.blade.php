@extends('layouts.master')

<!doctype html>
<html>
<title>Blood Glucose List</title>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: smakandar
 * Date: 7/11/2018
 * Time: 3:21 PM
 */

use App\Http\Controllers\BloodglucosesController;

BloodglucosesController::bginfo();


$url = "https://api.ihealthlabs.com:8443/openapiv2/application/glucose.json/?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=https%3A%2F%2Fmhealth.dev.attic.uno%2F%3Fthis%3Dthat&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qRDfiA-*1Q8TQ1oUgFqKv6xAEPvQ6Sahm10GsdYOZ*HZrNBkuq5AA-qo*lABQdjjpDTUPPDhLzOVawpwKdKVb6iLa*GZDxd2dm1-JCIyTr-m0EuFvBkcYRBFr3zNK9Whew&sc=f1510e5e64454e3c9f1114c859349fc4&sv=8acbec2826cd457a882415ea2b39ea93";
$json_bg_details = file_get_contents($url);
$response_bg = json_decode($json_bg_details);


for($i=0;$i<count($response_bg->BGDataList);$i++)
{
    if($response_bg->BGDataList[$i]->userid == $userid)
        {
    echo '<hr>';
    print_r("BG is:")."\x20".print_r($response_bg->BGDataList[$i]->BG);
    echo '<br>';
    print_r("DataID is:")."\x20".print_r($response_bg->BGDataList[$i]->DataID);
    echo '<br>';
    print_r("DataSource is:")."\x20".print_r($response_bg->BGDataList[$i]->DataSource);
    echo '<br>';
    print_r("DinnerSituation is:")."\x20".print_r($response_bg->BGDataList[$i]->DinnerSituation);
    echo '<br>';
    print_r("DrugSituation is:")."\x20".print_r($response_bg->BGDataList[$i]->DrugSituation);
    echo '<br>';
    $latest_time = date("Y-m-d\TH:i:s\Z",$response_bg->BGDataList[$i]->LastChangeTime);
    print_r("LastChangeTime is:")."\x20".print_r($latest_time);
    echo '<br>';
    print_r("Lat is:")."\x20".print_r($response_bg->BGDataList[$i]->Lat);
    echo '<br>';
    print_r("Lon is:")."\x20".print_r($response_bg->BGDataList[$i]->Lon);
    echo '<br>';
    $mdate = date("Y-m-d\TH:i:s\Z",$response_bg->BGDataList[$i]->MDate);
    print_r("MDate is:")."\x20".print_r($mdate);
    echo '<br>';
    print_r("Note:")."\x20".print_r($response_bg->BGDataList[$i]->Note);
    echo '<br>';
    print_r("TimeZone is:")."\x20".print_r($response_bg->BGDataList[$i]->TimeZone);
    echo '<br>';
    print_r("User ID is:")."\x20".print_r($response_bg->BGDataList[$i]->userid);
    echo '<br>';
    print_r("BGUnit is:")."\x20".print_r($response_bg->BGUnit);
    echo '<br>';
    print_r("CurrentRecordCount is:")."\x20".print_r($response_bg->CurrentRecordCount);
    echo '<br>';
    print_r("NextPageUrl is:")."\x20".print_r($response_bg->NextPageUrl);
    echo '<br>';
    print_r("PageLength is:")."\x20".print_r($response_bg->PageLength);
    echo '<br>';
    print_r("PageNumber is:")."\x20".print_r($response_bg->PageNumber);
    echo '<br>';
    print_r("PrevPageUrl is:")."\x20".print_r($response_bg->PrevPageUrl);
    echo '<br>';
    print_r("RecordCount is:")."\x20".print_r($response_bg->RecordCount);
    echo '<br>';
}
}

?>