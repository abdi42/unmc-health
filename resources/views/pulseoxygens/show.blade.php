@extends('layouts.master')

        <!DOCTYPE html>
<html>
<title>Pulse Oxygen List</title>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: smakandar
 * Date: 7/11/2018
 * Time: 3:29 PM
 */

use App\Http\Controllers\PulseoxygensController;

PulseoxygensController::pulseoxinfo();

$url = "https://api.ihealthlabs.com:8443/openapiv2/application/spo2.json/?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=https%3A%2F%2Fmhealth.dev.attic.uno%2F%3Fthis%3Dthat&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qRDfiA-*1Q8TQ1oUgFqKv6xAEPvQ6Sahm10GsdYOZ*HZrNBkuq5AA-qo*lABQdjjpDTUPPDhLzOVawpwKdKVb6iLa*GZDxd2dm1-JCIyTr-m0EuFvBkcYRBFr3zNK9Whew&sc=f1510e5e64454e3c9f1114c859349fc4&sv=ed973c5d280d4f07a81d07de424bf738";
$json_pulseox_details = file_get_contents($url);
$response_pulseox = json_decode($json_pulseox_details);


for($i=0;$i<count($response_pulseox->BODataList);$i++)
{
    if($response_pulseox->BODataList[$i]->userid == $userid)
        {
    echo '<hr>';
    print_r("Blood Oxygen is:")."\x20".print_r($response_pulseox->BODataList[$i]->BO);
    echo '<br>';
    print_r("DataID is:")."\x20".print_r($response_pulseox->BODataList[$i]->DataID);
    echo '<br>';
    print_r("DataSource is:")."\x20".print_r($response_pulseox->BODataList[$i]->DataSource);
    echo '<br>';
    print_r("HR is:")."\x20".print_r($response_pulseox->BODataList[$i]->HR);
    echo '<br>';
    $latest_time = date("Y-m-d\TH:i:s\Z",$response_pulseox->BODataList[$i]->LastChangeTime);
    print_r("LastChangeTime is:")."\x20".print_r($latest_time);
    echo '<br>';
    print_r("Lat is:")."\x20".print_r($response_pulseox->BODataList[$i]->Lat);
    echo '<br>';
    print_r("Lon is:")."\x20".print_r($response_pulseox->BODataList[$i]->Lon);
    echo '<br>';
    $mdate = date("Y-m-d\TH:i:s\Z",$response_pulseox->BODataList[$i]->MDate);
    print_r("MDate is:")."\x20".print_r($mdate);
    echo '<br>';
    print_r("TimeZone is:")."\x20".print_r($response_pulseox->BODataList[$i]->TimeZone);
    echo '<br>';
    print_r("User ID is:")."\x20".print_r($response_pulseox->BODataList[$i]->userid);
    echo '<br>';
    print_r("Current Record Count is:")."\x20".print_r($response_pulseox->CurrentRecordCount);
    echo '<br>';
    print_r("NextPageUrl is:")."\x20".print_r($response_pulseox->NextPageUrl);
    echo '<br>';
    print_r("PageLength is:")."\x20".print_r($response_pulseox->PageLength);
    echo '<br>';
    print_r("PageNumber is:")."\x20".print_r($response_pulseox->PageNumber);
    echo '<br>';
    print_r("PrevPageUrl is:")."\x20".print_r($response_pulseox->PrevPageUrl);
    echo '<br>';
    print_r("RecordCount is:")."\x20".print_r($response_pulseox->RecordCount);
    echo '<br>';
    echo '<br>';
}
}
?>
