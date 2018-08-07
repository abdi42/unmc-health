@extends('layouts.master')

@section('content')
    <title>Confirm Delete</title>

    <br> <h1>Delete Question</h1><br>

    <h3>Are you sure you want to delete?</h3>

    <p>{{ $question->question }}</p>

    <form action="{{'/questions/'. $question->id}}" method="post">

        {{csrf_field()}}

        {{method_field('DELETE')}}

        <br><a href="{{'/questions/'.$question->id}}"><button class="btn btn-primary">Delete</button></a>&nbsp;

        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/questions/") }}'" />

    </form>

    <hr>



@endsection