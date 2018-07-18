<?php

namespace App\Http\Controllers;

use App\Tip;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TipController extends Controller
{
    //

    public function tipcreate()
    {
        $tips = DB::table('tips')->get();

        return view('tips',compact('tips'));
    }

    public function tipstore(Request $request)
    {
        $this->validate($request,[
            'content' => 'required',
            'creation_date' => 'required',
            'creation_time' => 'required'
        ]);

        $tips = new \App\Tip();
        $tips->content = $request->input('content');
        $tips->creation_date = $request->input('creation_date');
        $tips->creation_time = $request->input('creation_time');
        $tips->save();

        return Redirect::back();
    }

    public function showtip()
    {
        $tips = Tip::all();

        return view('showtip',compact('tips'));
    }


    public function edittip($id)
    {
        $tips = Tip::all()->find($id);
        return view('edittip', compact('tips'));
    }


    public function tipedited(Request $request,$id)
    {
        $tips = Tip::all()->find($id);
        $this->validate($request,[
            'content' => 'required',
            'creation_date' => 'required',
            'creation_time' => 'required'
        ]);

        $tips->content = $request->input('content');
        $tips->creation_date = $request->input('creation_date');
        $tips->creation_time = $request->input('creation_time');
        $tips->save();

        return redirect('/tipshow');

    }

    public function tipdelete($id)
    {
        $tips = Tip::all()->find($id);
        $tips->delete();
        session()->flash('message', 'Deleted Successfully');
        return redirect('/tipshow');
    }
}
