<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Content;
use App\Category;
use App\Question;
use App\Answer;

function parseContent($index,$lines){
    $hint = "";
    $questions = collect([]);

    do {
        $currLine = collect($lines[$index]);
        $hint = $hint . $lines[$index]["CONTENT"] . " ";

        if($lines[$index]["Questions"]){
            $questions->push([
                "text" => $currLine["Questions"],
                "answers" => $currLine->only(["A","B","C","D","E"]),
                "correct" => $currLine["Correct Answer"]
            ]);
        }
        $index++;
    }  while($index < count($lines) && !$lines[$index]["HINT #"]);

    return [
        "hint" => $hint,
        "questions" => $questions
    ];
}

function seedContent($filename,$categoryName){
    print_r($categoryName);
    $category = new Category();
    $category->category = $categoryName;
    $category->save();

    $lines = (new FastExcel)->import($filename);

    foreach($lines as $index => $line){
        if($line["HINT #"]){
            $result = parseContent($index,$lines);
            $content = new Content();
            $content->content = $result['hint'];
            $content->category_id = $category->id;
            $content->save();

            foreach($result['questions'] as $question){

                $newQuestion = new Question();
                $newQuestion->content_id = $content->id;
                $newQuestion->text = $question['text'];
                $newQuestion->question_type = 'multiple choice';
                $newQuestion->save();

                foreach($question['answers'] as $key => $answer){
                    if(gettype($answer) === "boolean")
                        $answer = var_export($answer, true);

                    if($answer){
                        $newAnswer = new Answer();
                        $newAnswer->question_id = $newQuestion->id;
                        $newAnswer->answer = $answer;

                        if($key == $question['correct'])
                            $newAnswer->isAnswer = true;

                        $newAnswer->save();
                    }
                }

            }
        }
    }

}

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        seedContent(database_path('seeds/heart.xlsx'),'Heart');
        seedContent(database_path('seeds/diabetes.xlsx'),'Diabetes');
        seedContent(database_path('seeds/general.xlsx'),'General');
        seedContent(database_path('seeds/hypertension.xlsx'),'Hypertension');
    }
}
