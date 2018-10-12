@extends('layouts.dashboard')


@section('content')

<title>Content List</title>
<h1>Educational Contents</h1>


<p><b>Educational Content: </b></p>    {{$content->content}}<br><br>

<p><b>Educational Category: </b></p> {{$content->category->category}}  <br><br>

    <a href="{{'/contents/'.$content->id.'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>

<a href="{{'/contents/'.$content->id.'/delete'}}"><button class="btn btn-primary">Delete</button></a>

    <hr>

@endsection
