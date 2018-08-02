<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Subject;
use Illuminate\Http\Request;

class GoalsController extends Controller
{

    public function index()
    {
        $goals = Goal::all();

        $subjects = Subject::all();

        return view('goals.index',compact('goals','subjects'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $selected_subject = Subject::all()->pluck('subject');

        return view('goals.create', compact('subjects', 'selected_subject'));


    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'goal' => 'required'

        ]);

        $goal = new Goal();
        $goal->subject = $request->input('subject');
        $goal->goal = $request->input('goal');
        $goal->save();

        return redirect('/goals');
    }

}
