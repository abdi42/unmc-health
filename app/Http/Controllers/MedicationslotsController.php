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

    public function create(Subject $subject)
    {
        return view('medicationslots.create', [
            "subjectId" => $subject->subject
        ]);
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

            foreach ($slot['medication'] as $medication) {
                $medicationname = new Medicationname();
                $medicationname->medicationslot_id = $medicationslot->id;
                $medicationname->medication_name = $medication['name'];
                $medicationname->class = $medication['class'];
                $medicationname->save();
            }
        }
        return redirect('/subjects/' . $subject_id . '/medicationslots');
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

    public function update(Request $request, Subject $subject)
    {
        foreach ($request->input("slot") as $slot) {
            if (!array_key_exists('id', $slot)) {
                $medicationslot = new Medicationslot();
                $medicationslot->subject = $subject->subject;
            } else {
                $medicationslot = Medicationslot::with('medicines')->find(
                    $slot['id']
                );
            }

            $medicationslot->medication_time = $slot['time'];
            $medicationslot->medication_day = $slot['day'];
            $medicationslot->save();

            $medications = collect($slot['medication']);

            $medications->map(function ($medication, $key) use (
                $medicationslot
            ) {
                if (!array_key_exists('id', $medication)) {
                    $medicationName = new Medicationname();
                } else {
                    $medicationName = Medicationname::findOrFail(
                        $medication['id']
                    );
                }

                $medicationName->medicationslot_id = $medicationslot->id;
                $medicationName->medication_name = $medication['name'];
                $medicationName->class = $medication['class'];
                $medicationName->save();
            });
        }

        return redirect('/subjects/' . $medicationslot->subject);
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
