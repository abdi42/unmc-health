@extends('layouts.master')


@section('content')

    <title>Create Answer</title><br>
    <h1>Add an Answer</h1><br>


    <form action="/answers" method="post">
        <div>
            {{ csrf_field() }}

            <p>Select Question</p>
            <select name="question_id"  >
                @foreach($questions as $question)
                    <option value="{{ $question->id }}" >{{ $question->question }}</option>
                @endforeach
            </select><br><br>


            <div class="form-group">
                <p>Enter the Answer here: <br><br></p>
                <input type="text" name="answer" class="form-control" required><br>
            </div>

            <br>    <button type="submit" class="btn btn-primary">Save</button>&nbsp;

            <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/answers") }}'" />


        </div>
    </form>



@endsection