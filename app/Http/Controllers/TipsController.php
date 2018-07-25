<?php

namespace App\Http\Controllers;

use App\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TipsController extends Controller
{

    public function index()
    {
        $tips = Tip::all();

        return view('tips.index',compact('tips'));
    }

    public function create()
    {
        $tips = Tip::all();



        return view('tips.create',compact('tips'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'content' => 'required',

        ]);

        $tips = new Tip();
        $tips->content = $request->input('content');

        $tips->save();

        return redirect('/tips');
    }

    public function show($id)
    {
        $tip = Tip::find($id);

        return view('tips.show',compact('tip'));
    }


    public function edit($id)
    {
        $tips = Tip::all()->find($id);

        return view('tips.edit', compact('tips'));
    }



    public function update(Request $request,$id)
    {
        $tips = Tip::all()->find($id);
        $this->validate($request,[
            'content' => 'required',

        ]);

        $tips->content = $request->input('content');
        $tips->save();

        return redirect('/tips');

    }

    public function destroy($id)
    {
        $tips = Tip::all()->find($id);
        $tips->delete();
        session()->flash('message', 'Deleted Successfully');
        return redirect('/tips');
    }


    public function test()
    {
        $test = getenv('client_id');

        echo $test;
    }

}
