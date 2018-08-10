@extends('layouts.master')

@section('content')
<title>Reminders</title>
<h1>Reminders</h1>
    @foreach($reminders as $reminder)

        <p>Reminder Title :</p>
        <a href="{{ '/reminders/'.$reminder->id }}">{{ $reminder->title }}</a>

        <br><p>Reminder Message</p>
        {{ $reminder->body }}
        <hr>


    @endforeach

@endsection





