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

        return view('profile.users',compact('response_user'));




        // After creating the user, I want to take the string converted from JSON and store into variables as per the User Table. So need to test $json_data before proceeding further.
    }



    public function bpinfo()
    {
       ***REMOVED***                                                                                                      // Enter the URL to fetch the User Profile of all users
        $json = file_get_contents($url);                                                                                // Read the details of the file in the form of a String
        $response_user = json_decode($json);
        $url_bp = "https://api.ihealthlabs.com:8443/api/OpenApi/downloadbpdata.ashx?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=https%3A%2F%2Fmhealth.dev.attic.uno%2F%3Fthis%3Dthat&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qUYOKLveCzcmEpMulY7U3PH5MvrwyNJ0Lo9PvQRVyt5kSXrGzS1vAW4yW9t0SPfWr1GsLOXcsmW*immI542*E1E";
        $json_bp_details = file_get_contents($url_bp);
        $response_bp =  json_decode($json_bp_details);

        return view('profile/bplist', compact('response_bp','response_user'));

    }



    public function bpinfo_user2()
    {
       ***REMOVED***                                                                                                      // Enter the URL to fetch the User Profile of all users
        $json = file_get_contents($url);                                                                                // Read the details of the file in the form of a String
        $response_user = json_decode($json);
        $url_bp = "https://api.ihealthlabs.com:8443/openapiv2/user/51aea3fcf491499db7e4193b8d4e1c8c/bp.json/?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qTFGD5lM8R0yV1y4qsZdq-eVR-v7*mcIDsWFPAQ6eugD0gYrl1BpunAW*gAv6DOw1T6l6J471D*2akqgjZdX8*C1XBo6HJcALkANC*HNrA*IPyRjEy8fhtN73mJz9enK5Q&sc=f1510e5e64454e3c9f1114c859349fc4&sv=1c12d773ba5e41a49a29edc459d1b424";
        $json_bp_details = file_get_contents($url_bp);
        $response_bp_user2 = json_decode($json_bp_details);

        return view('subject2.bplist', compact('response_bp_user2','response_user'));


    }

    public function bpinfo_user3()
    {
       ***REMOVED***                                                                                                      // Enter the URL to fetch the User Profile of all users
        $json = file_get_contents($url);                                                                                // Read the details of the file in the form of a String
        $response_user = json_decode($json);
        $url_bp = "https://api.ihealthlabs.com:8443/openapiv2/user/7bc20629260e4602b2bfbc00172471e4/bp.json/?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=https%3A%2F%2Fmhealth.dev.attic.uno%2F%3Fthis%3Dthat&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qTz5SMXAQBueagv2X7Enz4iDw1gegCpU0slR1zgIuDuM1UtmMMSApGGrpMOt1jLq6pRnW4HoI4C-9SHL6OlOYzX*qRzX--e*XiH-87ADjp0TrQO6EjjkEXDZVZHSl5UB*w&sc=f1510e5e64454e3c9f1114c859349fc4&sv=1c12d773ba5e41a49a29edc459d1b424";
        $json_bp_details = file_get_contents($url_bp);
        $response_bp_user3 = json_decode($json_bp_details);

        return view('subject3.bplist', compact('response_bp_user3','response_user'));


    }

    public function bginfo()
    {
       ***REMOVED***
        $json_bg_details = file_get_contents($url);
        $response_bg = json_decode($json_bg_details);

        return view('profile.bglist',compact('response_bg'));


    }


    }
