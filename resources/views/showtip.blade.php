@extends('layouts.layout')

        <!doctype html>
<html>
<title>Tip List</title>
</html>

@foreach($tips as $tip)


    <p><b>Motivational Tip: </b></p>    {{$tip->content }}<br><br>

    <p><b>Tip Creation Date: </b></p>    {{$tip->creation_date}}<br><br>

    <p><b>Tip Creation Time: </b></p>   {{$tip->creation_time }}<br><br>

    <a href="{{'/tip/'.$tip->id.'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>
    <form action="{{'/tip/'. $tip->id}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <a href="{{'/tip/'.$tip->id}}"><button class="btn btn-primary">Delete</button></a>
    </form>
    <hr>

@endforeach