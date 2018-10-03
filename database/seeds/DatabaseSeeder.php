<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Content;
use App\Category;
use App\Question;
use App\Answer;

function seedSpreadSheet($filename){
    $categoryId = null;
    $contentId = null;
    $questionId = null;
    $answerId = null;
    
    $collection = (new FastExcel)->import($filename,function($line) use ($categoryId,$contentId,$answerId,$questionId)  {
        
        if($line["Category"] != ""){
            $categories = Category::where("category","=",$line["Category"])->first();
            
            if(!$categories){
                $categories = new Category();
                $categories->category = $line["Category"];
                $categoryId = $categories->id;
                $categories->save();
            }
            
            $content = new Content();
            $content->title = $line["Category"];
            $content->content = $line["CONTENT"];
            $content->category_id = $categories->id;
            $content->save();
            $contentId = $content->id;
        } 

        if($line["CONTENT"] != "" && $contentId) {
            $question = new Question();
            $question->content_id = $contentId;
            $question->question = $line["Questions"];
            $question->question_type = "Multi";
            $question->save();
            
            $answers = collect(["A","B","C","D","E"]);
            
            foreach ($answers as $key => $value) {
                if($line[$value] != "") {
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer = $line[$value];
                    $answer->save();
                }
            }
        }
        
    });   
}
 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        seedSpreadSheet(database_path('seeds/general.xlsx'));
        seedSpreadSheet(database_path('seeds/diabetes.xlsx'));
        seedSpreadSheet(database_path('seeds/heart.xlsx'));
        seedSpreadSheet(database_path('seeds/hypertension.xlsx'));                 
    }
}
