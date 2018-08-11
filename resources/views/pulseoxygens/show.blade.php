@extends('layouts.master')

@section('content')

<title>Pulse Oxygen List</title>
<h1>Pulse Oxygen List</h1>

<?php
/**
 * Created by PhpStorm.
 * User: smakandar
 * Date: 7/11/2018
 * Time: 3:29 PM
 */

use App\Http\Controllers\PulseoxygensController;

PulseoxygensController::pulseoxinfo();

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
    print_r("Note is:")."\x20".print_r($response_pulseox->BODataList[$i]->Note);
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

@endsection