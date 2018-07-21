@extends('layouts.master')


@section('content')

<title>Content List</title>


<p><b>Title: </b></p>    {{$content->title }}<br><br>

<p><b>Educational Content: </b></p>    {{$content->content}}<br><br>

<p><b>Educational Category: </b></p>   <br><br>

    <a href="{{'/contents/'.$content->id.'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>
<form action="{{'/contents/'. $content->id}}" method="post">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <a href="{{'/contents/'.$content->id}}"><button class="btn btn-primary">Delete</button></a>
</form>
    <hr>

@endsection





