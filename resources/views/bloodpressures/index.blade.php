@extends('layouts.master')

@section('content')

    <title>Blood Pressure Information</title>

<h1>Blood Pressure Information</h1>



@foreach($subjects as $subject)


    <li>

        <a href="/bloodpressures/{{$subject->userid}}">{{$subject->userid}}</a></li>

@endforeach

@endsection
