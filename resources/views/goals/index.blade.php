@extends('layouts.master')

@section('content')


    @foreach($goals as $goal)

        <p><b>Subject ID: </b>{{ $goal->subject }}</p>

        <p><b>Goal:</b></p>
        <a href="/goals/{{ $goal->id }}">{{ $goal->goal }}</a><br>




        <br><p style="align-r:right">   {{ $goal->created_at->toFormattedDateString() }}</p>
        <hr>
    @endforeach

    @endsection