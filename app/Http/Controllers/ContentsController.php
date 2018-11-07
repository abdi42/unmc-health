<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function index()
    {
        $contents = Content::orderBy('category_id', 'asc')
            ->orderBy('hint_number', 'asc')
            ->get();

        return view('contents.index', compact('contents', 'categories'));
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
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $content = new Content();
        $content->content = $request->input('content');
        $content->category_id = $request->input('category_id');
        $content->hint_number =
            Content::where(
                'category_id',
                '=',
                $request->input('category_id')
            )->count() + 1;
        $content->save();

        $questions = collect($request->input('questions'));

        $questions->map(function ($newQuestion) use ($content) {
            $question = new Question();
            $question->content_id = $content->id;
            $question->text = $newQuestion['text'];
            $question->question_type = 'multiple choice';
            $question->save();

            $options = collect($newQuestion['options']);

            $correctAnswer = intval($newQuestion["isAnswer"]);

            $options->map(function ($option, $key) use (
                $correctAnswer,
                $question
            ) {
                $answer = new Answer();
                $answer->question_id = $question->id;
                $answer->answer = $option['name'];
                $answer->isAnswer = $key === $correctAnswer;
                $answer->save();
            });
        });

        return redirect('/contents/' . $content->id)->with(
            'status',
            'Added new content!'
        );
    }

    public function show($id)
    {
        $content = Content::with('questions.answers')->find($id);
        $category = Category::find($id);

        return view('contents.show', compact('content', 'category'));
    }

    public function edit($id)
    {
        $content = Content::all()->find($id);
        $categories = Category::all();

        return view('contents.edit', compact('content', 'categories'));
    }

    public function update(Request $request, $id)
    {
        //return $request->all();

        $content = Content::findOrFail($id);

        $this->validate($request, [
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $content->content = $request->input('content');
        $content->category_id = $request->input('category_id');
        $content->save();

        $questions = collect($request->input('questions'));

        $questions->map(function ($questionData) use ($content) {
            $questionData['id'] = intval($questionData['id']);
            $questionData['isAnswer'] = intval($questionData['isAnswer']);

            if (!array_key_exists('id', $questionData)) {
                $question = new Question();
            } else {
                $question = Question::findOrFail($questionData['id']);
            }

            $question->content_id = $content->id;
            $question->text = $questionData['text'];
            $question->save();

            $options = collect($questionData['options']);

            $options->map(function ($optionData, $key) use (
                $questionData,
                $question
            ) {
                $optionData['id'] = intval($optionData['id']);

                if (!array_key_exists('id', $optionData)) {
                    $answer = new Answer();
                } else {
                    $answer = Answer::findOrFail($optionData['id']);
                }

                $answer->question_id = $question->id;
                $answer->answer = $optionData['name'];
                $answer->isAnswer = $key === $questionData['isAnswer'];
                $answer->save();
            });
        });

        return redirect('/contents/' . $id)->with('status', 'Update content!');
    }

    public function delete($id)
    {
        $content = Content::all()->find($id);

        return view('contents.delete', compact('content'));
    }

    public function destroy($id)
    {
        $content = Content::all()->find($id);
        $content->delete();
        session()->flash('message', 'Deleted Successfully');
        return redirect('/contents');
    }
}
