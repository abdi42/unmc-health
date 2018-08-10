@extends('layouts.master')

@section('content')
<title>Action Plans</title>
<h1>Action Plans</h1>
    @foreach($subjects as $subject)

        <a href="/actionplans/{{ $subject->subject }}">{{ $subject->subject }}</a>



        <hr>
    @endforeach

@endsection