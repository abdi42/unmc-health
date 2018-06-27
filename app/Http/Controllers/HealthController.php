<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use App\Http\Requests;
use GuzzleHttp\Client;
//use GuzzleHttp\Message\Request;
//use GuzzleHttp\Message\Response;



//use Illuminate\Http\Request;

use App\User;

class HealthController extends Controller
{
    //

    public function index()
    {
        //$client = new Client();
        //$api_response = $client->get("https://api.ihealthlabs.com:8443/api/OpenApi/downloadweightdata.ashx?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=https%3A%2F%2Fmhealth.dev.attic.uno%2F%3Fthis%3Dthat&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qUYOKLveCzcmEpMulY7U3PH5MvrwyNJ0Lo9PvQRVyt5kSXrGzS1vAW4yW9t0SPfWr1GsLOXcsmW*immI542*E1E");
        //$api_response->setDefaultOption('verify', false);
        $url = "https://api.ihealthlabs.com:8443/openapiv2/user/da81211bbfcc47ab93224d767947a115/weight.json/?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=https%3A%2F%2Fmhealth.dev.attic.uno%2F%3Fthis%3Dthat&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qRDfiA-*1Q8TQ1oUgFqKv6xAEPvQ6Sahm10GsdYOZ*HZrNBkuq5AA-qo*lABQdjjpDTUPPDhLzOVawpwKdKVb6iLa*GZDxd2dm1-JCIyTr-m0EuFvBkcYRBFr3zNK9Whew&sc=f1510e5e64454e3c9f1114c859349fc4&sv=1ee677093af84ca8a4548ae7ba701ddb";
        $new_response = file_get_contents($url);
        echo "<pre>";
        $response = json_decode($new_response);
        echo "</pre>";
        //dd($response);
        return view('profile/list', compact('response'));
    }


    public function getuserinfo()
    {
       ***REMOVED***                                                                                                      // Enter the URL to fetch the User Profile of all users
        $json = file_get_contents($url);                                                                                // Read the details of the file in the form of a String
        $response_user = json_decode($json);                                                                    // Take the JSON encoded string and convert into a PHP variable.
        //return view('');                                                                                               //  Go to the respective view to see all the User data
        //$users = new User();                                                                                            // Create a new user

       //echo count($response_user);
       //echo count($response_user->UserInfoList);


       for($i=0;$i<count($response_user->UserInfoList);$i++)
       {
           echo '<hr>';
           print_r("CurrentRecordCount is:")."\x20".print_r($response_user->CurrentRecordCount);
           echo '<br/>';
           print_r("HeightUnit is:")."\x20".print_r($response_user->HeightUnit);
           echo '<br/>';
           print_r("NextPageUrl is:")."\x20".print_r($response_user->NextPageUrl);
           echo '<br/>';
           print_r("PageNumber is:")."\x20".print_r($response_user->PageNumber);
           echo '<br/>';
           print_r("PrevPageUrl is:")."\x20".print_r($response_user->PrevPageUrl);
           echo '<br/>';
           print_r("RecordCount is:")."\x20".print_r($response_user->RecordCount);
           echo '<br/>';
           print_r("Date of Birth is:")."\x20".print_r($response_user->UserInfoList[$i]->dateofbirth);
           echo '<br/>';
           print_r("Gender is:")."\x20".print_r($response_user->UserInfoList[$i]->gender);
           echo '<br/>';
           print_r("Height is:")."\x20".print_r($response_user->UserInfoList[$i]->height);
           echo '<br/>';
           print_r("Logo:")."\x20".print_r($response_user->UserInfoList[$i]->logo);
           echo '<br/>';
           print_r("Nickname is:")."\x20".print_r($response_user->UserInfoList[$i]->nickname);
           echo '<br/>';
           print_r("userid is:")."\x20".print_r($response_user->UserInfoList[$i]->userid);
           echo '<br/>';
           print_r("weight is:")."\x20".print_r($response_user->UserInfoList[$i]->weight);
           echo '<br/>';
           print_r("Weight Unit is:")."\x20".print_r($response_user->WeightUnit);
           echo '<br/>';
       }

        // After creating the user, I want to take the string converted from JSON and store into variables as per the User Table. So need to test $json_data before proceeding further.
    }
    /*
        public function weightinfo()
        {
            $url = "";
            $json_bp_details = file_get_contents($url);
            $json_data =  json_decode($json_bp_details, true);
        }

    */
    public function bpinfo()
    {
        $url_bp = "https://api.ihealthlabs.com:8443/api/OpenApi/downloadbpdata.ashx?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=https%3A%2F%2Fmhealth.dev.attic.uno%2F%3Fthis%3Dthat&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qUYOKLveCzcmEpMulY7U3PH5MvrwyNJ0Lo9PvQRVyt5kSXrGzS1vAW4yW9t0SPfWr1GsLOXcsmW*immI542*E1E";
        $json_bp_details = file_get_contents($url_bp);

        $response_bp =  json_decode($json_bp_details);
        //echo "<pre>";
        //var_dump($response_bp);
        //echo "</pre>";
        //echo $response_bp->CurrentRecordCount
        //."\x20";
        //echo $response_bp->BPDataList->BPL;
        //echo $response_bp->NextPageUrl
       // ."\x20";

        //echo count($response_bp);

        for($i=0;$i<count($response_bp->BPDataList);$i++)
        {
            echo '<hr>';
            print_r("BPL Value:") ."\x20". print_r($response_bp->BPDataList[$i]->BPL);
            echo '<br/>';
            print_r("Data ID value is:")."\x20".print_r($response_bp->BPDataList[$i]->DataID);
            echo '<br/>';
            print_r("HP value is:")."\x20".print_r($response_bp->BPDataList[$i]->HP);
            echo '<br/>';
            print_r("HR value is:")."\x20".print_r($response_bp->BPDataList[$i]->HR);
            echo '<br/>';
            print_r("IsArr is:")."\x20".print_r($response_bp->BPDataList[$i]->IsArr);
            echo '<br/>';
            print_r("LP value is:")."\x20".print_r($response_bp->BPDataList[$i]->LP);
            echo '<br/>';
            print_r("LastChangeTime is:")."\x20".print_r($response_bp->BPDataList[$i]->LastChangeTime);
            echo '<br/>';
            print_r("Lat is:")."\x20".print_r($response_bp->BPDataList[$i]->Lat);
            echo '<br/>';
            print_r("Lon is:")."\x20".print_r($response_bp->BPDataList[$i]->Lon);
            echo '<br/>';
            print_r("MDate is:")."\x20".print_r($response_bp->BPDataList[$i]->MDate);
            echo '<br/>';
            print_r("Note is:")."\x20".print_r($response_bp->BPDataList[$i]->Note);
            echo '<br/>';
            print_r("BPL Value:") ."\x20". print_r($response_bp->BPUnit);
            echo '<br/>';
            print_r("Current Record Count:") ."\x20". print_r($response_bp->CurrentRecordCount);
            echo '<br/>';
            print_r("Next Page Url is:") ."\x20". print_r($response_bp->NextPageUrl);
            echo '<br/>';
            print_r("Record Count is:") ."\x20". print_r($response_bp->RecordCount);
            echo '<br/>';
        }




        //echo $response_bp->DataID[2];
        //echo $response_bp->PageLength;
        //echo $response_bp->Number;
        //echo $response_bp->PrevPageUrl;
        //echo $response_bp->RecordCount;
        //echo $response_bp->RecordCount;
        //return view('profile/bplist', compact($response_bp));

    }

    public function bpinfo_user2()
    {
        $url_bp = "https://api.ihealthlabs.com:8443/openapiv2/user/51aea3fcf491499db7e4193b8d4e1c8c/bp.json/?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qTFGD5lM8R0yV1y4qsZdq-eVR-v7*mcIDsWFPAQ6eugD0gYrl1BpunAW*gAv6DOw1T6l6J471D*2akqgjZdX8*C1XBo6HJcALkANC*HNrA*IPyRjEy8fhtN73mJz9enK5Q&sc=f1510e5e64454e3c9f1114c859349fc4&sv=1c12d773ba5e41a49a29edc459d1b424";
        $json_bp_details = file_get_contents($url_bp);
        $response_bp_user2 = json_decode($json_bp_details);

        for ($i=0;$i<count($response_bp_user2->BPDataList);$i++)
        {
            echo '<hr>';
            print_r("BPL Value:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->BPL);
            echo '<br/>';
            print_r("Data ID value is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->DataID);
            echo '<br/>';
            print_r("HP value is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->HP);
            echo '<br/>';
            print_r("HR value is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->HR);
            echo '<br/>';
            print_r("IsArr is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->IsArr);
            echo '<br/>';
            print_r("LP value is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->LP);
            echo '<br/>';
            print_r("LastChangeTime is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->LastChangeTime);
            echo '<br/>';
            print_r("Lat is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->Lat);
            echo '<br/>';
            print_r("Lon is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->Lon);
            echo '<br/>';
            print_r("MDate is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->MDate);
            echo '<br/>';
            print_r("Note is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->Note);
            echo '<br/>';
            print_r("BPL Value:") . "\x20" . print_r($response_bp_user2->BPUnit);
            echo '<br/>';
            print_r("Current Record Count:") . "\x20" . print_r($response_bp_user2->CurrentRecordCount);
            echo '<br/>';
            print_r("Next Page Url is:") . "\x20" . print_r($response_bp_user2->NextPageUrl);
            echo '<br/>';
            print_r("Record Count is:") . "\x20" . print_r($response_bp_user2->RecordCount);
            echo '<br/>';
        }


    }

    public function bpinfo_user3()
    {

        $url_bp = "https://api.ihealthlabs.com:8443/openapiv2/user/7bc20629260e4602b2bfbc00172471e4/bp.json/?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=https%3A%2F%2Fmhealth.dev.attic.uno%2F%3Fthis%3Dthat&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qTz5SMXAQBueagv2X7Enz4iDw1gegCpU0slR1zgIuDuM1UtmMMSApGGrpMOt1jLq6pRnW4HoI4C-9SHL6OlOYzX*qRzX--e*XiH-87ADjp0TrQO6EjjkEXDZVZHSl5UB*w&sc=f1510e5e64454e3c9f1114c859349fc4&sv=1c12d773ba5e41a49a29edc459d1b424";
        $json_bp_details = file_get_contents($url_bp);
        $response_bp_user3 = json_decode($json_bp_details);
        for ($i=0;$i<count($response_bp_user3->BPDataList);$i++)
        {
            echo '<hr>';
            print_r("BPL Value:") . "\x20" . print_r($response_bp_user3->BPDataList[$i]->BPL);
            echo '<br/>';
            print_r("Data ID value is:") . "\x20" . print_r($response_bp_user3->BPDataList[$i]->DataID);
            echo '<br/>';
            print_r("HP value is:") . "\x20" . print_r($response_bp_user3->BPDataList[$i]->HP);
            echo '<br/>';
            print_r("HR value is:") . "\x20" . print_r($response_bp_user3->BPDataList[$i]->HR);
            echo '<br/>';
            print_r("IsArr is:") . "\x20" . print_r($response_bp_user3->BPDataList[$i]->IsArr);
            echo '<br/>';
            print_r("LP value is:") . "\x20" . print_r($response_bp_user3->BPDataList[$i]->LP);
            echo '<br/>';
            print_r("LastChangeTime is:") . "\x20" . print_r($response_bp_user3->BPDataList[$i]->LastChangeTime);
            echo '<br/>';
            print_r("Lat is:") . "\x20" . print_r($response_bp_user3->BPDataList[$i]->Lat);
            echo '<br/>';
            print_r("Lon is:") . "\x20" . print_r($response_bp_user3->BPDataList[$i]->Lon);
            echo '<br/>';
            print_r("MDate is:") . "\x20" . print_r($response_bp_user3->BPDataList[$i]->MDate);
            echo '<br/>';
            print_r("Note is:") . "\x20" . print_r($response_bp_user3->BPDataList[$i]->Note);
            echo '<br/>';
            print_r("BPL Value:") . "\x20" . print_r($response_bp_user3->BPUnit);
            echo '<br/>';
            print_r("Current Record Count:") . "\x20" . print_r($response_bp_user3->CurrentRecordCount);
            echo '<br/>';
            print_r("Next Page Url is:") . "\x20" . print_r($response_bp_user3->NextPageUrl);
            echo '<br/>';
            print_r("Record Count is:") . "\x20" . print_r($response_bp_user3->RecordCount);
            echo '<br/>';
        }

    }

    public function bginfo()
    {
       ***REMOVED***
        $json_bg_details = file_get_contents($url);
        $response_bg = json_decode($json_bg_details);

        for($i=0;$i<count($response_bg);$i++)
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
            print_r("LastChangeTime is:")."\x20".print_r($response_bg->BGDataList[$i]->LastChangeTime);
            echo '<br>';
            print_r("DrugSituation is:")."\x20".print_r($response_bg->BGDataList[$i]->DrugSituation);
            echo '<br>';
            print_r("Lat is:")."\x20".print_r($response_bg->BGDataList[$i]->Lat);
            echo '<br>';
            print_r("Lon is:")."\x20".print_r($response_bg->BGDataList[$i]->Lon);
            echo '<br>';
            print_r("MDate is:")."\x20".print_r($response_bg->BGDataList[$i]->MDate);
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
            print_r("PrevPageUrl is:")."\x20".print_r($response_bg->PrevPageUrl);
            echo '<br>';
            print_r("RecordCount is:")."\x20".print_r($response_bg->RecordCount);
            echo '<br>';
        }
    }


    }