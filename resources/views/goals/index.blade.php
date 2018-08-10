@extends('layouts.master')

@section('content')
<title>Goals</title>
<h1>Goals</h1>
    @foreach($subjects as $subject)

        <a href="/goals/{{ $subject->subject }}">{{ $subject->subject }}</a>



        <hr>
    @endforeach

@endsection