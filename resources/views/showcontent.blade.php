@extends('layouts.layout')

        <!doctype html>
<html>
<title>Content List</title>
</html>

@foreach($contents as $content)


<p><b>Title: </b></p>    {{$content->title }}<br><br>

<p><b>Educational Content: </b></p>    {{$content->content}}<br><br>

<p><b>Educational Category: </b></p>   {{$content->category }}<br><br>

    <a href="{{'/educationalcontent/'.$content->id.'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>
<form action="{{'/educationalcontent/'. $content->id}}" method="post">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <a href="{{'/educationalcontent/'.$content->id}}"><button class="btn btn-primary">Delete</button></a>
</form>
    <hr>

@endforeach







