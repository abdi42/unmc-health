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
                'body' => 'required',
                'reminder_time1' => 'required'
        ]);
        $reminder = new Reminder();
        $reminder->subject = $request->input('subject');
        $reminder->title = $request->input('title');
        $reminder->body = $request->input('body');
        $reminder->reminder_time1 = $request->input('reminder_time1');
        $reminder->reminder_time2 = $request->input('reminder_time2');
        $reminder->reminder_time3 = $request->input('reminder_time3');
        $reminder->save();

        return redirect('/reminders');
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
                'body' => 'required',
                'reminder_time1' => 'required'
            ]);
        $reminder = Reminder::find($id);
        $reminder->subject = $request->input('subject');
        $reminder->title = $request->input('title');
        $reminder->body = $request->input('body');
        $reminder->reminder_time1 = $request->input('reminder_time1');
        $reminder->reminder_time2 = $request->input('reminder_time2');
        $reminder->reminder_time3 = $request->input('reminder_time3');
        $reminder->save();

        return redirect('/reminders');
    }

    public function delete($id)
    {

        $reminder = Reminder::all()->find($id);

        return view('reminders.delete',compact('reminder'));


    }

    public function destroy($id)
    {
        $reminder = Reminder::all()->find($id);
        $reminder->delete();
        session()->flash('message', 'Deleted Successfully');
        return redirect('/reminders');
    }
}
