@extends('layouts.master')

@section('content')

    @foreach($reminders as $reminder)

        <p>Reminder Title :</p>
        <a href="{{ '/reminders/'.$reminder->id }}">{{ $reminder->title }}</a>

        <br><p>Reminder Message</p>
        {{ $reminder->body }}
        <hr>


    @endforeach

@endsection