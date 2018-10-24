<?php

namespace App\Http\Controllers;

use App\Medicationname;
use App\Medicationslot;
use App\Subject;
use Illuminate\Http\Request;

class MedicationslotsController extends Controller
{
    public function index(Subject $subject)
    {
        return view('medicationslots.index', [
            'subjectId' => $subject->subject,
            'medicationslots' => $subject->medicationslots
        ]);
    }


    public function create($subject_id)
    {
        $subjects = Subject::all();
        $selected_subject = Subject::all()->pluck('subject');

        return view('medicationslots.create', compact('subjects', 'selected_subject', 'subject_id'));


    }


    public function store(Request $request, $subject_id)
    {

        $subject = Subject::findOrFail($subject_id);

        foreach ($request->input('slot') as $slot) {
            $medicationslot = new Medicationslot();
            $medicationslot->subject = $subject->subject;
            $medicationslot->medication_time = $slot['time'];
            $medicationslot->medication_day = $slot['day'];
            $medicationslot->save();

            foreach ($slot['medication_name'] as $name) {
                $medicationname = new Medicationname();
                $medicationname->medicationslot_id = $medicationslot->id;
                $medicationname->medication_name = $name;
                $medicationname->save();
            }
        }
        return redirect('/subjects/'.$subject_id.'/medicationslots');
    }

    public function show($subject)
    {

        $medicationslots = Subject::find($subject)->medicationslots;


        return view('medicationslots.show', compact('medicationslots'));

    }

    public function edit($id)
    {
        $medicationslots = Medicationslot::with('medicines')->find($id);
        return view('medicationslots.edit', compact('medicationslots'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'time' => 'required',
        ]);

        $medicationslot = Medicationslot::with('medicines')->find($id);
        $medicationslot->medication_time = $request->input('time');
        $medicationslot->medication_day = $request->input('day');
        $medicationslot->save();

        $medications = collect($request->input('medication_name'));

        $medications->map(function ($medication, $key) use ($medicationslot) {
            if (!array_key_exists('id', $medication)) {
                $medicationName = new Medicationname();
            } else {
                $medicationName = Medicationname::findOrFail($medication['id']);
            }

            $medicationName->medicationslot_id = $medicationslot->id;
            $medicationName->medication_name = $medication['name'];
            $medicationName->save();
        });

        return redirect('/subjects/'.$medicationslot->subject);
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
