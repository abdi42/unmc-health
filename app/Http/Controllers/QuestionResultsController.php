<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionResult;

class QuestionResultsController extends Controller
{
    public function __invoke($subjectId)
    {
        $questionResults = QuestionResult::with('question.content.category')->where('subject_id',$subjectId)->get();
        return view('questionsresults.index', compact('questionResults','subjectId'));
    }
}
