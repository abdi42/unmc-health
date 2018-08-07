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


}
