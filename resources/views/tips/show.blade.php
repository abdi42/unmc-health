@extends('layouts.master')


@section('content')
<title>Motivational Tip</title>
<h1>Motivational Tip</h1>

    <p><b>Motivational Tip: </b></p>    {{$tip->content }}<br><br>



    <a href="{{'/tip/'.$tip->id.'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>


    <a href="{{ '/tip/'.$tip->id.'/delete' }}"><button class="btn btn-primary">Delete</button></a>

    <hr>




    @endsection