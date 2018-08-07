@extends('layouts.master')

@section('content')
    <title>Confirm Delete</title>

    <br> <h1>Delete Subject</h1><br>

    <h3>Are you sure you want to delete?</h3>

    <p>{{ $subject->subject }}</p>

    <form action="{{'/subjects/'. $subject->subject}}" method="post">

        {{csrf_field()}}

        {{method_field('DELETE')}}

        <br><a href="{{'/subjects/'.$subject->subject}}"><button class="btn btn-primary">Delete</button></a>&nbsp;

        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/subjects/") }}'" />

    </form>

    <hr>



@endsection