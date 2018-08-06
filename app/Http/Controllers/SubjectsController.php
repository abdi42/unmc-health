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
        $client_id = getenv('CLIENT_ID');
        $client_secret = getenv('CLIENT_SECRET');
        $redirect_uri = getenv('REDIRECT_URI');
        $access_token = getenv('ACCESS_TOKEN');
        $sc_subject = getenv('SC_SUBJECT');
        $sv_subject = getenv('SV_SUBJECT');


        $url = "https://api.ihealthlabs.com:8443/openapiv2/application/userinfo.json/?client_id=".$client_id."&client_secret=".$client_secret."&redirect_uri=".$redirect_uri."&access_token=".$access_token."&sc=".$sc_subject."&sv=".$sv_subject."&locale=en_US";                                                                                                      // Enter the URL to fetch the User Profile of all users
        $json = file_get_contents($url);                                                                                // Read the details of the file in the form of a String
        $response_user = json_decode($json);

        return view('subjects.index',compact('response_user'));
    }

    public function display()
    {
        $subjects = Subject::all();

        return view('subjects.display', compact('subjects'));
    }


    public function create()
    {
        $subject = Subject::all();

        return view('subjects.create',compact('subject'));
    }


    public function store(Request $request)
    {
        $this->validate($request,
            [

                'id' => 'required',
                'pin' => 'required'


            ]);


        try{
            $subject = new Subject();
            $subject->subject = $request->input('id');
            $subject->pin = bcrypt($request->input('pin'));
            $subject->disease_state = implode(",",$request->input('disease'));
            $subject->virtualvisit = $request->input('virtualvisit');
            $subject->enrollmentdate = $request->input('enrollmentdate');

            $subject->save();

            return redirect('/subjects');
        }

        catch(\Illuminate\Database\QueryException $e)
        {
            $sqlState = $e->errorInfo[0];
            $errorCode = $e->errorInfo[1];
            if($sqlState == "23000" && $errorCode == 1062)
            {
                return redirect('/subjects/create');
            }

        }



    }



    public function message()
    {
        return view('subjects.message');
    }



    public function show($subject)
    {
        $subject = Subject::find($subject);


        return view('subjects.show', compact('subject'));

    }


    public function edit($subject)
    {
        $subject = Subject::all()->find($subject);


        return view('subjects.edit', compact('subject'));

    }

    public function update(Request $request,$subject)
    {
        $this->validate($request,
            [


                'pin' => 'required',


            ]);

        $subject = Subject::all()->find($subject);
        $subject->subject = $request->input('id');
        $subject->userid = $request->input('userid');
        $subject->pin = bcrypt($request->input('pin'));
        $subject->disease_state = implode(",",$request->input('disease'));
        $subject->virtualvisit = $request->input('virtualvisit');
        $subject->enrollmentdate = $request->input('enrollmentdate');

        $subject->save();

        return redirect('/subjects');
    }


    public function index_weight()
    {
        SubjectsController::index();
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
        SubjectsController::index();
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
        SubjectsController::index();
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
        SubjectsController::index();
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
