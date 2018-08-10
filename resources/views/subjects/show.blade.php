@extends('layouts.master')


@section('content')
    <title>Subject</title>
    <h1>Subject</h1>

    <p><b>Subject: </b></p>    {{$subject->subject }}<br><br>

    <p><b>Disease State</b></p> {{$subject->disease_state}}<br><br>

    <p><b>Virtual Visit:</b></p>
    @if( $subject->virtualvisit == 1)
        Yes
        @elseif( $subject->virtualvisit == 0)
        No
        @endif

    <p><b>Enrollment Start Date</b></p> {{ $subject->enrollmentdate }}

 <br> <br>  <a href="{{'/subject/'.$subject->subject.'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>


    <a href="{{ '/subject/'.$subject->subject.'/delete' }}"><button class="btn btn-primary">Delete</button></a>

    <hr>




@endsection