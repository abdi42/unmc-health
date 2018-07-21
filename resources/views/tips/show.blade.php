@extends('layouts.master')


@section('content')
<title>Tip List</title>


    <p><b>Motivational Tip: </b></p>    {{$tip->content }}<br><br>



    <a href="{{'/tip/'.$tip->id.'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>
    <form action="{{'/tip/'. $tip->id}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <a href="{{'/tip/'.$tip->id}}"><button class="btn btn-primary">Delete</button></a>
    </form>
    <hr>



    @endsection