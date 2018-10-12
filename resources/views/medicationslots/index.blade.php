@extends('layouts.dashboard')

@section('content')
<title>Medication Time</title>
<h1>Medication Time</h1>
    @foreach($subjects as $subject)

        <a href="/medicationslots/{{ $subject->subject }}">{{ $subject->subject }}</a>



        <hr>
    @endforeach

@endsection
