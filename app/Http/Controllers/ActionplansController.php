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
            'actionplan' => 'required'

        ]);

        $actionplan = new Actionplan();
        $actionplan->subject = $request->input('subject');
        $actionplan->actionplan = $request->input('actionplan');
        $actionplan->save();

        return redirect('/goals/create');
    }
}
