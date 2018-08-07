@extends('layouts.master')

@section('content')

    <title>Edit Question</title>

    <br><h1>Edit a Question</h1>

    <form action="/questions/{{ $questions->id }}" method="post">
        {{ csrf_field() }}

        {{ method_field('PUT') }}


        <p>Select Content: </p>
        <select name="content_id">
            @foreach($contents as $content)
                <option value="{{ $content->id }} ">{{ $content->content }}</option>
            @endforeach

        </select><br><br>

         <p>Edit the Question here:</p>
        <input type="text" name="question"  value="{{ $questions->question }}" class="form-control"required> <br>


        <p>Select the Question type:</p>
        <input type="radio" name="question_type" value="Multiple Choice" checked="checked">Multiple Choice
        <input type="radio" name="question_type" value="True or False">True or False
        <input type="radio" name="question_type" value="Fill in the blanks">Fill in the blanks <br>

        <br> <button type="submit" class="btn btn-primary">Update</button> &nbsp;
        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("medicationslots") }}'" />

    </form>
@endsection