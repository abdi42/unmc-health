@extends('layouts.master')

@section('content')
    <title>Confirm Delete</title>

    <br> <h1>Delete Answer</h1><br>

    <h3>Are you sure you want to delete?</h3>

    <p>{{ $answer->answer }}</p>

    <form action="{{'/answers/'. $answer->id}}" method="post">

        {{csrf_field()}}

        {{method_field('DELETE')}}

        <br><a href="{{'/answers/'.$answer->id}}"><button class="btn btn-primary">Delete</button></a>&nbsp;

        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/answers/") }}'" />

    </form>

    <hr>



@endsection