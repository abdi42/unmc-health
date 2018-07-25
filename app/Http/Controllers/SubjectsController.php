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
        $url = "";                                                                                                      // Enter the URL to fetch the User Profile of all users
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
