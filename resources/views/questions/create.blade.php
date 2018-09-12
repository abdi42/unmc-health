@extends('layouts.master')

@section('content')

    <title>Add Question</title>

    <br><h1>Add a Question</h1><br>


    <form action="/questions" method="post">
        <div>
            {{ csrf_field() }}



            <p>Select Content: </p>
            <select name="content_id">
                @foreach($contents as $content)
                    <option value="{{ $content->id }} ">{{ $content->title }}</option>
                @endforeach

            </select><br><br>

            <p>Enter the Question</p>
            <input type="text" name="question" placeholder="Enter the question here" class="form-control" required><br><br>

            <p>Enter the Question type</p>
            <input type="radio" name="question_type" value="Multiple Choice" checked="checked"> Multiple Choice  &nbsp;
            <input type="radio" name="question_type" value="True or False"> True or False &nbsp;
            <input type="radio" name="question_type" value="Fill in the blanks"> Fill in the Blanks

            <br><br>  <button type="submit" class="btn btn-primary">Save</button>&nbsp;
            <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/questions") }}'" />
        </div>

@endsection
