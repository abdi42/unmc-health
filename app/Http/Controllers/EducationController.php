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

        return view('contents', compact('categories'));

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


        return view('showcontent', compact('contents'));

    }

    public function editcontent($id)
    {
        $content = Educationalcontent::all()->find($id);
        $categories = DB::table('educationalcontentcategories')->pluck('category')->all();
        return view('editcontent', compact('content', 'categories'));

    }

    public function contentedited(Request $request, $id)
    {

        $contents = Educationalcontent::all()->find($id);
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);


        $contents->title = $request->input('title');
        $contents->content = $request->input('content');
        $contents->category = $request->input('category');
        $contents->save();

        return redirect('/showcontent');

    }

    public function contentdelete($id)
    {
        $content = Educationalcontent::all()->find($id);
        $content->delete();
        session()->flash('message', 'Deleted Successfully');
        return redirect('/showcontent');
    }





    public function categorycreate()
    {
      //$contents = Educationalcontent::all()->pluck('id');

        $contents = Educationalcontent::all();

      return view('category',compact('contents'));

    }

    public function categorystore(Request $request)
    {
        $this->validate($request,
        [
            'educationalcontent_id' => 'required',
            'category' => 'required'
        ]);

        $categories = new \App\Educationalcontentcategory();
        $categories->educationalcontent_id = $request->input('educationalcontent_id');
        $categories->category = $request->input('category');
        $categories->save();

        return redirect('/showcategory');

    }

    public function showcategory()
    {
        $categories = Educationalcontentcategory::all();

        return view('showcategory', compact('categories'));
    }

    public function categoryedit(Request $request,$id)
    {
       $categories = Educationalcontentcategory::all()->find($id);

       $contents = Educationalcontent::all();


       return view('editcategory',compact('categories','contents'));

    }

    public function categoryedited(Request $request,$id)
    {

        $categories = Educationalcontentcategory::all()->find($id);
        $this->validate($request,
            [
                'educationalcontent_id' => 'required',
                'category' => 'required'
            ]);

        $categories->educationalcontent_id = $request->input('educationalcontent_id');
        $categories->category = $request->input('category');
        $categories->save();

        return redirect('/showcategory');

    }

    public function categorydelete($id)
    {
        $categories = Educationalcontentcategory::all()->find($id);
        $categories->delete();
        session()->flash('message', 'Deleted Successfully');
        return redirect('/showcategory');
    }
}
