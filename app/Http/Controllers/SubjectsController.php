<?php

namespace App\Http\Controllers;

use App\Bloodglucose;
use App\Bloodpressure;
use App\Subject;
use App\Pulseoxygen;
use App\Weight;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{

    public static function index()
    {
        $url = "https://api.ihealthlabs.com:8443/openapiv2/application/userinfo.json/?client_id=5215a7f7153b4573ac733d4f9e81e78e&client_secret=2ae0a5fb1b34419bbfcd5e5340873b04&redirect_uri=https%3A%2F%2Fmhealth.dev.attic.uno%2F%3Fthis%3Dthat&access_token=vUBS4EQ5iSxztHDzB*td0*77kyO1QJMjfoExFF8RnqBcF0TDyfGZjthkQSfCvNEHP*YE6c8y8iig8g3yPuE2qRDfiA-*1Q8TQ1oUgFqKv6xAEPvQ6Sahm10GsdYOZ*HZrNBkuq5AA-qo*lABQdjjpDTUPPDhLzOVawpwKdKVb6iLa*GZDxd2dm1-JCIyTr-m0EuFvBkcYRBFr3zNK9Whew&sc=f1510e5e64454e3c9f1114c859349fc4&sv=fa258cbecd5e426e96de78ba55e2cfa6&locale=en_US";                                                                                                      // Enter the URL to fetch the User Profile of all users
        $json = file_get_contents($url);                                                                                // Read the details of the file in the form of a String
        $response_user = json_decode($json);

        for ($i = 0; $i < count($response_user->UserInfoList); $i++) {
            $subject = new Subject();
            $subject->userid = $response_user->UserInfoList[$i]->userid;

            $subject->save();


        }
        return view('subjects.index',compact('response_user'));
    }




    public function index_weight()
    {
        $subjects = Subject::all();
        $userid = Subject::all();

        return view('weights.index',compact('subjects','userid'));
    }



    public function show_weight($userid)
    {
        $weights = Weight::all();

        return view('weights.show',compact('weights','userid'));
    }




    public function index_bloodpressure()
    {
        $subjects = Subject::all();
        $userid = Subject::all();

        return view('bloodpressures.index',compact('subjects','userid'));
    }



    public function show_bloodpressure($userid)
    {
        $bps = Bloodpressure::all();

        return view('bloodpressures.show',compact('bps','userid'));
    }



    public function index_bloodglucose()
    {
        $subjects = Subject::all();
        $userid = Subject::all();

        return view('bloodglucoses.index',compact('subjects','userid'));
    }


    public function show_bloodglucose($userid)
    {
        $bgs = Bloodglucose::all();

        return view('bloodglucoses.show',compact('bgs','userid'));
    }



    public function index_pulseoxygen()
    {
        $subjects = Subject::all();
        $userid = Subject::all();

        return view('pulseoxygens.index',compact('subjects','userid'));
    }



    public function show_pulseoxygen($userid)
    {
        $pulse = Pulseoxygen::all();

        return view('pulseoxygens.show',compact('pulse','userid'));
    }


}
