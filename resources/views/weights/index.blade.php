@extends('layouts.master')

@section('content')

    <title>Weight Information</title>

<h1>Weight Information</h1>

    @foreach($subjects as $subject)

    <li><a href="/weights/{{$subject->userid}}">{{$subject->userid}}</a></li>

    @endforeach

@endsection