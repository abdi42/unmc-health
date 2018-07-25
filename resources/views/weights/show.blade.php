@extends('layouts.master')

        <!DOCTYPE html>
<html>
<title>Weight List</title>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: smakandar
 * Date: 7/11/2018
 * Time: 2:05 PM
 */
use App\Http\Controllers\WeightsController;

WeightsController::index();

$url = "https://api.ihealthlabs.com:8443/openapiv2/application/weight.json/?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=https%3A%2F%2Fmhealth.dev.attic.uno%2F%3Fthis%3Dthat&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qRDfiA-*1Q8TQ1oUgFqKv6xAEPvQ6Sahm10GsdYOZ*HZrNBkuq5AA-qo*lABQdjjpDTUPPDhLzOVawpwKdKVb6iLa*GZDxd2dm1-JCIyTr-m0EuFvBkcYRBFr3zNK9Whew&sc=f1510e5e64454e3c9f1114c859349fc4&sv=1ee677093af84ca8a4548ae7ba701ddb";
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

?>

