<?php

namespace App\Http\Controllers;


use App\Medicationname;
use App\Medicationslot;
use App\Subject;
use Illuminate\Http\Request;

class MedicationnamesController extends Controller
{
    public function index()
    {
        $medicationnames = Medicationname::all();

        $medicationslots = Medicationslot::all();

        $subjects = Subject::all();

        return view('medicationnames.index',compact('medicationslots','medicationnames','subjects'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $selected_subject = Subject::all()->pluck('subject');
        $medicationslots = Medicationslot::all();
        $selected_slot = Medicationslot::all()->pluck('medication_time');

        return view('medicationnames.create', compact('subjects', 'selected_subject','medicationslots','selected_slot'));


    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'medicationslot_id' => 'required',
            'medication_name' => 'required'

        ]);

        $medicationname = new Medicationname();
        $medicationname->medicationslot_id = $request->input('medicationslot_id');
        $medicationname->medication_name = $request->input('medication_name');
        $medicationname->save();

        return redirect('/medicationnames');
    }

    public function show($id)
    {

        $medicationnames = (object)Medicationname::all()->find($id);


        return view('medicationnames.show', compact('medicationnames'));

    }

}
