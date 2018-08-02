@extends('layouts.master')

@section('content')
    <title>Confirm Delete</title>

    <br> <h1>Delete Goal</h1><br>

    <h3>Are you sure you want to delete?</h3>

    <p>{{ $goals->goal }}</p>

    <form action="{{'/goals/'. $goals->id}}" method="post">

        {{csrf_field()}}

        {{method_field('DELETE')}}

        <br><a href="{{'/goals/'.$goals->id}}"><button class="btn btn-primary">Delete</button></a>&nbsp;

        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/goals/") }}'" />

    </form>

    <hr>



@endsection