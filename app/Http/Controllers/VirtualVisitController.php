<?php

namespace App\Http\Controllers;

use App\Subject;
use App\VirtualVisit;
use Illuminate\Http\Request;

class VirtualVisitController extends Controller
{
    public function index(Subject $subject)
    {
        $visits = VirtualVisit::where('subject', '=', $subject->subject)->get();

        return view('virtualvisits.index', [
            "subject" => $subject,
            "visits" => $visits
        ]);
    }

    public function create(Subject $subject)
    {
        $visits = VirtualVisit::where('subject', '=', $subject->subject)->get();

        return view('virtualvisits.create', [
            "subject" => $subject,
            "visits" => $visits
        ]);
    }

    public function store(Request $request, Subject $subject)
    {
        $this->validate($request, [
            'visit.*.date' => 'required',
            'visit.*.time' => 'required'
        ]);

        foreach ($request->input('visit') as $visitData) {
            if (!array_key_exists('id', $visitData)) {
                $visit = new VirtualVisit();
            } else {
                $visit = VirtualVisit::find($visitData['id']);
            }

            $visit->subject = $subject->subject;
            $visit->date = $visitData['date'] . ' ' . $visitData['time'];
            $visit->notes = $visitData['notes'];
            $visit->save();
        }

        $subject->virtual_visit_url = $request->input('virtual_visit_url');
        $subject->save();

        return redirect('/subjects/' . $subject->subject . '/reminders')->with(
            'status',
            'Saved virtual visits!'
        );
    }

    public function update(Request $request, Subject $subject)
    {
        $this->validate($request, [
            'visit.*.date' => 'required',
            'visit.*.time' => 'required'
        ]);

        foreach ($request->input('visit') as $visitData) {
            if (!array_key_exists('id', $visitData)) {
                $visit = new VirtualVisit();
            } else {
                $visit = VirtualVisit::find($visitData['id']);
            }

            $visit->subject = $subject->subject;
            $visit->date = $visitData['date'] . ' ' . $visitData['time'];
            $visit->notes = $visitData['notes'];
            $visit->save();
        }

        $subject->virtual_visit_url = $request->input('virtual_visit_url');
        $subject->save();

        return redirect(
            '/subjects/' . $subject->subject . '/virtualvisits'
        )->with('status', 'Saved virtual visits!');
    }
}
