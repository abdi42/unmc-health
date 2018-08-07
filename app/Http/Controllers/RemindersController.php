<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reminder;
use App\Subject;

class RemindersController extends Controller
{
    public function index()
    {
        $reminders = Reminder::all();

        return view('reminders.index',compact('reminders'));
    }

    public function create()
    {
        $reminders = Reminder::all();
        $subjects = Subject::all();

        return view('reminders.create', compact('reminders','subjects'));

    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
            'title' => 'required',
                'body' => 'required'
        ]);
        $reminder = new Reminder();
        $reminder->subject = $request->input('subject');
        $reminder->title = $request->input('title');
        $reminder->body = $request->input('body');
        $reminder->save();
    }

    public function edit($id)
    {
        $reminder = Reminder::find($id);

        $subjects = Subject::all();

        return view('reminders.edit',compact('reminder','subjects'));
    }

    public function show()
    {
        $reminders = Reminder::all();

        return view('reminders.show',compact('reminders'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,
            [
                'title' => 'required',
                'body' => 'required'
            ]);
        $reminder = Reminder::find($id);
        $reminder->subject = $request->input('subject');
        $reminder->title = $request->input('title');
        $reminder->body = $request->input('body');
        $reminder->save();

        return redirect('/reminders');
    }

    public function delete()
    {

    }

    public function destroy()
    {

    }
}
