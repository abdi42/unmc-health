<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Mail\SendingMail;
use App\Mail\SendsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\user;
use Illuminate\Support\Facades\Mail;
use App\Notifications\UserRegisteredNotification;

class mailController extends Controller
{
    //
    public function send()
    {
        Mail::send(new SendMail());
    }

    public function email()
    {
      return view('email');
    }


    public function sendAll()
    {

        //$emails[]= User::all()->pluck('email');

        $users = User::all()->pluck('email')->toArray();


     // $emails = ['unmcmhealth@gmail.com','szm.makandar@gmail.com'];

        Mail::send('mail',[],function($message) use ($users)
        {
            $message->to($users)->subject('Daily Health Tip');
            $message->from('unmcmhealth@gmail.com','unmc');
        });
        with('title');
        //var_dump(Mail::failures());
        //exit;
        return view('sentall');
    }
/*
    protected function registered(Request $request,$user)
    {
        $users = \App\User::all()->pluck('email');
        foreach ($users as $user) {
            $user->notify(new UserRegisteredNotification($user));
        }
    }
*/
    public function sending()
    {
        Mail::send(new SendingMail());
        return view('sentall');
    }

    public function dailymessage()
    {
       return view('test');
    }


}
