<?php

namespace App\Http\Controllers;
use App\Category;
use \App\Content;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;

class ContentsController extends Controller
{

    public function index()
    {
       $contents = Content::all();

       $categories = Category::all();

        return view('contents.index',compact('contents','categories'));
    }



    public function create()
    {
        $categories = Category::all();
        $selected_id = Category::all()->pluck('id');

        return view('contents.create', compact('categories', 'selected_id'));


    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $content = new Content();
        $content->title = $request->input('title');
        $content->content = $request->input('content');
        $content->category_id = $request->input('category_id');
        $content->save();
        
        $questions = collect($request->input('questions'));
        
        $questions->map(function($newQuestion) use($content) {
          $question = new Question();
          $question->content_id = $content->id;
          $question->question = $newQuestion['text'];
          $question->question_type = 'multiple choice';
          $question->save();
          
          $options = collect($newQuestion['options']);
          
          $options->map(function($option) use ($question) {
            $answer = new Answer();
            $answer->question_id = $question->id;
            $answer->answer = $option['name'];
            $answer->save();
          });
          
        });
        

        return redirect('/contents');
    }

    public function show($id)
    {
        $content = Content::find($id);
        $category = Category::find($id);

        return view('contents.show', compact('content','category'));

    }

    public function edit($id)
    {
        $content = Content::all()->find($id);
        $categories = Category::all();

        return view('contents.edit', compact('content', 'categories'));

    }

    public function update(Request $request, $id)
    {

        $content = Content::all()->find($id);
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ]);


        $content->title = $request->input('title');
        $content->content = $request->input('content');
        $content->category_id = $request->input('category_id');
        $content->save();

        return redirect('/contents');

    }

    public function delete($id)
    {
        $content = Content::all()->find($id);

        return view('contents.delete',compact('content'));
    }

    public function destroy($id)
    {
        $content = Content::all()->find($id);
        $content->delete();
        session()->flash('message', 'Deleted Successfully');
        return redirect('/contents');
    }



}
