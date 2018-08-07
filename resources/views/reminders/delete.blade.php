@extends('layouts.master')

@section('content')
    <title>Confirm Delete</title>

    <br> <h1>Delete Reminder</h1><br>

    <h3>Are you sure you want to delete?</h3>

    <p>{{ $reminder->title }}</p>

    <form action="{{'/reminders/'. $reminder->id}}" method="post">

        {{csrf_field()}}

        {{method_field('DELETE')}}

        <br><a href="{{'/reminders/'.$reminder->id}}"><button class="btn btn-primary">Delete</button></a>&nbsp;

        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/reminders") }}'" />

    </form>

    <hr>



@endsection