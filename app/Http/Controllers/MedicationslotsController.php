<?php

namespace App\Http\Controllers;

use App\Medicationslot;
use App\Subject;
use Illuminate\Http\Request;

class MedicationslotsController extends Controller
{
    public function index()
    {
        $medicationslots = Medicationslot::all();

        $subjects = Subject::all();

        return view('medicationslots.index',compact('medicationslots','subjects'));
    }


    public function create()
    {
        $subjects = Subject::all();
        $selected_subject = Subject::all()->pluck('subject');

        return view('medicationslots.create', compact('subjects', 'selected_subject'));


    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'medication_time' => 'required'

        ]);

        $medicationslot = new Medicationslot();
        $medicationslot->subject = $request->input('subject');
        $medicationslot->medication_time = $request->input('medication_time');
        $medicationslot->medication_day = implode(",",$request->input('day'));
        $medicationslot->save();

        return redirect('/medicationslots');
    }

    public function show($subject)
    {

        $medicationslots = Subject::find($subject)->medicationslots;


        return view('medicationslots.show', compact('medicationslots'));

    }

    public function edit($id)
    {
        $medicationslots = Medicationslot::all()->find($id);

        return view('medicationslots.edit', compact('medicationslots'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [

            'medication_time' => 'required',

        ]);

        $medicationslot = Medicationslot::all()->find($id);
        $medicationslot->medication_time = $request->input('medication_time');
        $medicationslot->medication_day= implode(",",$request->input('day'));
        $medicationslot->save();

        return redirect('/medicationslots');
    }

    public function delete($id)
    {
        $medicationslot = Medicationslot::all()->find($id);

        return view('medicationslots.delete', compact('medicationslot'));
    }

    public function destroy($id)
    {
        $medicationslot = Medicationslot::all()->find($id);
        $medicationslot->delete();
        session()->flash('message', 'Deleted Successfully');
        return redirect('/medicationslots');
    }


}
