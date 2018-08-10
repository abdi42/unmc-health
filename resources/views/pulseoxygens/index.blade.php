@extends('layouts.master')


@section('content')

    <title>Pulse Oxygen Information</title>

    <h1>Pulse Oxygen Information</h1>

    @foreach($subjects as $subject)

    <li><a href="/pulseoxygens/{{$subject->userid}}">{{$subject->userid}}</a></li>

    @endforeach

@endsection