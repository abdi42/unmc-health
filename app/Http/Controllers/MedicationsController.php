<?php

namespace App\Http\Controllers;

use App\Medication;
use App\Subject;
use Illuminate\Http\Request;

class MedicationsController extends Controller
{
    public function index()
    {
        $medications = Medication::all();

        $subjects = Subject::all();

        return view('medications.index',compact('medications','subjects'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $selected_subject = Subject::all()->pluck('subject');

        return view('medications.create', compact('subjects', 'selected_subject'));


    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'medication_name1' => 'required',
            'medication_time' => 'required'

        ]);

        $medication = new Medication();
        $medication->subject = $request->input('subject');
        $medication->medication_name1 = $request->input('medication_name1');
        $medication->medication_name2 = $request->input('medication_name2');
        $medication->medication_name3 = $request->input('medication_name3');
        $medication->medication_time=$request->input('medication_time');
        $medication->medication_days= implode(",",$request->input('day'));
        $medication->save();

        return redirect('/medications');
    }

    public function show($subject)
    {
        $medications = Subject::find($subject)->medications;


        return view('medications.show', compact('medications'));
    }

    public function edit($id)
    {
        $medications = Medication::all()->find($id);

        return view('medications.edit', compact('medications'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [

            'medication_name1' => 'required',
            'medication_time' => 'required'

        ]);

        $medication = Medication::all()->find($id);
        $medication->medication_name1 = $request->input('medication_name1');
        $medication->medication_name2 = $request->input('medication_name2');
        $medication->medication_name3 = $request->input('medication_name3');
        $medication->medication_time = $request->input('medication_time');
        $medication->medication_days= implode(",",$request->input('day'));
        $medication->save();

        return redirect('/medications');
    }
}
