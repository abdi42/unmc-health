@extends('layouts.master')

@section('content')
    <title>Questions</title>
    <h1>Question</h1>

    <div class="col-sm-8">
        <p>Question:</p>
        {{ $question->question }}

         <p><br>Question Type:</p>
         {{ $question->question_type }}

        <br><br><a href="{{'/questions/'.$question->id.'/edit'}}"><button  class="btn btn-primary">Edit</button></a><br><br>
        <a href="{{'/questions/'.$question->id.'/delete'}}"><button class="btn btn-primary">Delete</button></a>
        <hr>
    </div>
@endsection
