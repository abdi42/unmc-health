@extends('layouts.master')

@section('content')

    <p><b>Subjects</b></p>
    @foreach($subjects as $subject)
     <a href="/subjects/{{$subject->subject}}">{{ $subject->subject }}</a>
        <hr>
    @endforeach

@endsection