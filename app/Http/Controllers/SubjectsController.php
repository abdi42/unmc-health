<?php

namespace App\Http\Controllers;

use App\Bloodglucose;
use App\Bloodpressure;
use App\Subject;
use App\Pulseoxygen;
use App\Weight;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class SubjectsController extends Controller
{

    public static function index()
    {
      $users = getHealthData('application/userinfo.json',getenv('SC_SUBJECT'),getenv('SV_SUBJECT'));
      dd($users);

      return view('subjects.index',compact('users'));
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
        $subject = Subject::with('medicationslots')->find($subject);
        $subject->subject = strtoupper($subject->subject);

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

    public function delete($id)
    {
       $subject = Subject::all()->find($id);

       return view('subjects.delete',compact('subject'));
    }

    public function destroy($id)
    {
        $subject = Subject::all()->find($id);
        $subject->delete();
        session()->flash('message', 'Deleted Successfully');
        return redirect('/subjects');
    }



    public function index_weight()
    {
        $subjects = Subject::all();

        return view('weights.index',compact('subjects'));
    }



    public function show_weight(Request $request,$userid)
    {
        $subject = Subject::where('userid','=',$userid)->first();
        $subjectId = strtoupper($subject->subject);
        $weights = getHealthData('user/'. $subject->userid .'/weight.json',getenv('SC_WEIGHT'),getenv('SV_WEIGHT'),$subject->access_token);

        return view('weights.show',compact('weights','subjectId','userid'));
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

    public function handleOAuthRedirect(Request $request){
      $subject = Subject::findorFail($request->query('subject_code'));
      $subject->registration_token = $request->query('code');

      $subject->save();
    }

    public function authorize_subject(Request $request) {


      $subject = Subject::findOrFail($request->query('subject_code'));
      $code = $request->query('code');


      $url = "https://api.ihealthlabs.com:8443/OpenApiV2/OAuthv2/userauthorization/";

      $client = new Client();

      $response = $client->request('GET',$url,[
        'query' => [
          'client_id' => getenv('CLIENT_ID'),
          'client_secret' => getenv('CLIENT_SECRET'),
          'redirect_uri' => getenv('REDIRECT_URI'),
          'grant_type' => 'authorization_code',
          'code' => $code
        ]
      ]);

      $body = json_decode($response->getBody());

      $subject->access_token = $body->AccessToken;
      $subject->refresh_token = $body->RefreshToken;
      $subject->expires = $body->RefreshTokenExpires;
      $subject->userid = $body->UserID;

      $subject->save();

      return view('auth.oauth');

    }

    public function webhook(Request $request) {
      Log::debug('An informational message.');
      Log::debug(json_encode($request->json()));
      return response()->json(['success' => 'success'], 200);
    }



}
