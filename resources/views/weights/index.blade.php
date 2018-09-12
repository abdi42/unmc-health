@extends('layouts.dashboard')

@section('content')

    <title>Weight Information</title>

    @foreach($subjects as $subject)
    
    <li><a href="/weights/{{$subject->userid}}">{{$subject->subject}}</a></li>

    @endforeach

@endsection
 
