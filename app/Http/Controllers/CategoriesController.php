<?php

namespace App\Http\Controllers;
use \App\Content;
use \App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
            // /categories

        $categories = Category::all();

        return view('categories.index',compact('categories'));
    }


    public function create()
    {
        // /categories/create
        $categories = Category::all();


        return view('categories.create',compact('categories'));

    }

    public function store(Request $request)
    {
        // POST /tasks


        $this->validate($request,
            [

                'category' => 'required',
            ]);

        $categories = new Category();
        $categories->category = $request->input('category');
        $categories->save();

        return redirect('/categories');

    }

    public function show($id)
    {
        // GET /categories/id
        $category = Category::find($id);

        return view('categories.show',compact('category'));
    }

    public function edit($id)
    {
        // GET /categories/id/edit

        $categories = Category::all()->find($id);


        return view('categories.edit',compact('categories'));

    }

    public function update(Request $request,$id)
    {

        // PATCH /categories/id

        $categories = Category::all()->find($id);
        $this->validate($request,
            [
                'category' => 'required',
            ]);

        $categories->category = $request->input('category');
        $categories->save();

        return redirect('/categories');

    }

    public function delete($id)
    {
        $categories = Category::all()->find($id);

        return view('categories.delete', compact('categories'));
    }

    public function destroy($id)
    {
        // DELETE /categories/id

        $categories = Category::all()->find($id);
        $categories->delete();
        session()->flash('message', 'Deleted Successfully');
        return redirect('/categories');
    }
}
