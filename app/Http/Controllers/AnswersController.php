<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;

class AnswersController extends Controller
{
    public function index()
    {
        $answers = Answer::all();

        $questions = Question::all();

        return view('answers.index',compact('answers','questions'));
    }

    public function create()
    {
        $answers = Answer::all();
        $questions = Question::all();

        return view('answers.create', compact('questions', 'answers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'answer' => 'required'

        ]);

        $answer = new Answer();
        $answer->question_id = $request->input('question_id');
        $answer->answer = $request->input('answer');
        $answer->save();

        return redirect('/answers');
    }

    public function edit($id)
    {
        $answers = Answer::all()->find($id);

        $questions = Question::all();

        return view('answers.edit', compact('answers','questions'));
    }

    public function show($id)
    {
        $answers = Answer::all()->find($id);

        return view('answers.show',compact('answers'));
    }

    public function update(Request $request,$id)
    {
        $answer = Answer::all()->find($id);

        $this->validate($request, [
            'answer' => 'required'

        ]);

        $answer->question_id = $request->input('question_id');
        $answer->answer = $request->input('answer');
        $answer->save();

        return redirect('/answers');
    }

    public function delete($id)
    {
        $answer = Answer::all()->find($id);

        return view('answers.delete',compact('answer'));
    }

    public function destroy($id)
    {
        $answer = Answer::all()->find($id);
        $answer->delete();
        session()->flash('message', 'Deleted Successfully');
        return redirect('/answers');
    }

}
