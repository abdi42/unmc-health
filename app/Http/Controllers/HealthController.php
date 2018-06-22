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
        $url = "https://api.ihealthlabs.com:8443/api/OpenApi/downloadweightdata.ashx?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=https%3A%2F%2Fmhealth.dev.attic.uno%2F%3Fthis%3Dthat&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qUYOKLveCzcmEpMulY7U3PH5MvrwyNJ0Lo9PvQRVyt5kSXrGzS1vAW4yW9t0SPfWr1GsLOXcsmW*immI542*E1E";
        $new_response = file_get_contents($url);
        echo "<pre>";
        $response = json_decode($new_response);
        echo "</pre>";
        //dd($response);
        return view('profile/list', compact('response'));
    }

/*
    public function alluserinfo()
    {
        $url = "";                                                                                                      // Enter the URL to fetch the User Profile of all users
        $json = file_get_contents($url);                                                                                // Read the details of the file in the form of a String
        $json_data = json_decode($json, true);                                                                    // Take the JSON encoded string and convert into a PHP variable.
        //return view('');                                                                                               //  Go to the respective view to see all the User data
        $users = new User();                                                                                            // Create a new user

        // After creating the user, I want to take the string converted from JSON and store into variables as per the User Table. So need to test $json_data before proceeding further.
    }

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
        echo "<pre>";
        var_dump($response_bp);
        echo "</pre>";
        //echo $response_bp->CurrentRecordCount
        //."\x20";
        //echo $response_bp->BPDataList->BPL;
        //echo $response_bp->NextPageUrl
       // ."\x20";

        echo count($response_bp);

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

    public function bginfo()
    {
        $url = "";
        $json_bg_details = file_get_contents($url);
        $json_data = json_decode($json_bg_details, true);
    }


    }
