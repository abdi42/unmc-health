@extends('layouts.master')

@section('content')

    <title>Blood Glucose Information</title>

<h1>Blood Glucose Information</h1>


<p>BG Information</p>
@foreach($subjects as $subject)


    <li>

        <a href="/bloodglucoses/{{$subject->userid}}">{{$subject->userid}}</a></li>

@endforeach


@endsection
