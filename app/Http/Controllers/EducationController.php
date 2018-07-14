<?php

namespace App\Http\Controllers;

use App\Educationalcontent;
use App\Educationalcontentcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
{
    //

    public function contentcreate()
    {
        $categories = DB::table('educationalcontentcategories')->pluck('category')->all();

        //$categories = DB::table('educationalcontentcategories')->get();

        return view('contents',compact('categories'));

    }


    public function contentstore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);

        $contents = new \App\Educationalcontent();
        $contents->title = $request->input('title');
        $contents->content = $request->input('content');
        $contents->category = $request->input('category');
        $contents->save();

        return Redirect::back();
    }

    public function showcontent()
    {
        $contents = Educationalcontent::all();



        return view('showcontent',compact('contents'));

    }

    public function editcontent($id)
    {
        $content = Educationalcontent::all()->find($id);
        return view('editcontent', compact('content'));

    }

    public function contentdelete()
    {
        return view('contentdelete');
    }







    public function contentdeleted()
    {
        print('Delete request sent successfully');
    }



    public function categorycreate()
    {
        $category = new Educationalcontentcategory();
        $category->category = Input::get('category');
        $category->save();

        return Redirect::back();
    }
}
