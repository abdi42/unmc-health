


<?php
//echo "<pre>";
$response;
//$i=0;
//$values = $response->WeightDataList[count($response)];
//var_dump($response);
//echo "</pre>";
//echo count($response->WeightDataList);
//echo $response->CurrentRecordCount;
//print_r("The BMI value is:\n")."\x20".print_r($response->WeightDataList[0]->BMI ."\n");
//print_r("The Weight value is:")."\x20".print_r($response->WeightDataList[0]->WeightValue."\n");

$url = "***REMOVED***                                                                                                      // Enter the URL to fetch the User Profile of all users
$json = file_get_contents($url);                                                                                // Read the details of the file in the form of a String
$response_user = json_decode($json);
//$output = "<ul>";
for($i=0;$i<count($response->WeightDataList);$i++)
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

//echo $response;
//var_dump($response);
//echo $response['BMI'][0];
//echo $response[2]->BMI;
//echo $response;


//var_dump($response[]->Current)
//echo $response[43];
//echo $response[64];
//$CurrentRecordValue = $response[25];
//$NextPageUrl = $response[43];

//echo "Current Record:" ."\x20". $CurrentRecordValue;
//echo "<br>";
//echo "NextPageUrl:" ."\x20". $NextPageUrl;

/*
$url = "https://api.ihealthlabs.com:8443/api/OpenApi/downloadweightdata.ashx?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=https%3A%2F%2Fmhealth.dev.attic.uno%2F%3Fthis%3Dthat&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qUYOKLveCzcmEpMulY7U3PH5MvrwyNJ0Lo9PvQRVyt5kSXrGzS1vAW4yW9t0SPfWr1GsLOXcsmW*immI542*E1E";
$new_response = file_get_contents($url);
$response = json_encode($new_response, true);

/*
$response = json_encode($new_response, true);
echo $response[25];

$CurrentRecordCount = $response[25];

echo $CurrentRecordCount;
*/
//var_dump($response);
//echo $response[25];


?>



