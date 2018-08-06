<?php

namespace App\Http\Controllers;

use App\Question;
use App\Content;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        $contents = Content::all();

        return view('questions.index',compact('questions','contents'));
    }


    public function create()
    {
        $questions = Question::all();
        $selected_id = Content::all()->pluck('id');
        $contents = Content::all();

        return view('questions.create', compact('questions', 'selected_id','contents'));


    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'question_type' => 'required'
        ]);

        $question = new Question();
        $question->content_id = $request->input('content_id');
        $question->question = $request->input('question');
        $question->question_type = $request->input('question_type');
        $question->save();

        return redirect('/questions');
    }

    public function show($id)
    {
        $question = Question::find($id);


        return view('questions.show',compact('question'));
    }


    public function edit($id)
    {
        // GET /categories/id/edit

        $questions = Question::all()->find($id);

        $contents = Content::all();


        return view('questions.edit',compact('questions','contents'));

    }


}
