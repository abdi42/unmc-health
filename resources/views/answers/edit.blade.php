@extends('layouts.master')

@section('content')
    <title>Edit Answers</title>




    <br><h1>Edit the Answer</h1><br>


    <form action="/answers/{{$answers->id}}" method="post">


        {{ csrf_field() }}

        {{method_field('PUT')}}

        <p>Select Question</p>
        <select name="question_id"  >
            @foreach($questions as $question)
                <option value="{{ $question->id }}" >{{ $question->question }}</option>
            @endforeach
        </select><br><br>

        <p>Edit the Answer here:</p>
        <input type="text" name="answer" class="form-control" value="{{ $answers->answer }}" required><br>


        <br> <button type="submit" class="btn btn-primary">Update</button> &nbsp;
        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/answers") }}'" />

    </form>

@endsection