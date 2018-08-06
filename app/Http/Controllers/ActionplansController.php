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

            'actionplan' => 'required',

        ]);

        $actionplan = Actionplan::all()->find($id);
        $actionplan->actionplan = $request->input('actionplan');
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
