<?php

namespace App\Http\Controllers;

use App\Actionplan;
use App\Subject;
use Illuminate\Http\Request;

class ActionplansController extends Controller
{
    public function index()
    {
        $actionplans = Actionplan::all();

        $subjects = Subject::all();

        return view('actionplans.index',compact('actionplans','subjects'));
    }


    public function create()
    {
        $subjects = Subject::all();
        $selected_subject = Subject::all()->pluck('subject');

        return view('actionplans.create', compact('subjects', 'selected_subject'));


    }




    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'physically_active' => 'required',
            'medications' => 'required',
            'food_choices' => 'required',
            'stress' => 'required',
            'health_problems' => 'required',
            'how_much' => 'required',
            'when' => 'required',
            'how_often' => 'required',
            'action_sureness' => 'required',
            'barriers' => 'required',
            'avoid_barriers' => 'required',
            'goal' => 'required'

        ]);

        $actionplan = new Actionplan();
        $actionplan->subject = $request->input('subject');
        $actionplan->physically_active = $request->input('physically_active');
        $actionplan->medications = $request->input('medications');
        $actionplan->food_choices = $request->input('food_choices');
        $actionplan->stress = $request->input('stress');
        $actionplan->health_problems = $request->input('health_problems');
        $actionplan->how_much = $request->input('how_much');
        $actionplan->when = $request->input('when');
        $actionplan->how_often = $request->input('how_often');
        $actionplan->action_sureness = $request->input('action_sureness');
        $actionplan->barriers = $request->input('barriers');
        $actionplan->avoid_barriers = $request->input('avoid_barriers');
        $actionplan->goal = $request->input('goal');
        $actionplan->save();

        return redirect('/actionplans');
    }


    public function show($subject)
    {
        $actionplans = Subject::find($subject)->actionplans;


        return view('actionplans.show', compact('actionplans'));
    }


    public function edit($id)
    {
        $actionplans = Actionplan::all()->find($id);

        return view('actionplans.edit', compact('actionplans'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'physically_active' => 'required',
            'medications' => 'required',
            'stress' => 'required',
            'food_choices' => 'required',
            'health_problems' => 'required',
            'how_much' => 'required',
            'when' => 'required',
            'how_often' => 'required',
            'action_sureness' => 'required',
            'barriers' => 'required',
            'avoid_barriers' => 'required',
            'goal' => 'required'


        ]);

        $actionplan = Actionplan::all()->find($id);
        $actionplan->physically_active = $request->input('physically_active');
        $actionplan->medications = $request->input('medications');
        $actionplan->food_choices = $request->input('stress');
        $actionplan->health_problems = $request->input('health_problems');
        $actionplan->how_much = $request->input('how_much');
        $actionplan->when = $request->input('when');
        $actionplan->how_often = $request->input('how_often');
        $actionplan->action_sureness = $request->input('action_sureness');
        $actionplan->barriers = $request->input('barriers');
        $actionplan->avoid_barriers = $request->input('avoid_barriers');
        $actionplan->goal = $request->input('goal');
        $actionplan->save();


        return redirect('/actionplans');
    }

    public function delete($id)
    {
        $actionplans = Actionplan::all()->find($id);

        return view('actionplans.delete', compact('actionplans'));
    }

    public function destroy($id)
    {
        $actionplans = Actionplan::all()->find($id);
        $actionplans->delete();
        session()->flash('message', 'Deleted Successfully');
        return redirect('/actionplans');
    }
}
