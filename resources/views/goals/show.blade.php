@extends('layouts.master')

@section('content')
    <title>Goal</title>
    <h1>Goal</h1>

    @for($i=0;$i<count($goals);$i++)

        <p><b>Subject ID: </b> {{ $goals[$i]['subject'] }}</p>

        <p><br><b>Goal:</b></p>  {{ $goals[$i]['goal'] }}

        <p><br><b>Created On: </b>   {{ $goals[$i]['created_at'] }}</p>

        <a href="{{'/goals/'.$goals[$i]['id'].'/edit'}}"><button class="btn btn-primary">Edit</button></a><br><br>

        <a href="{{'/goals/'.$goals[$i]['id'].'/delete'}}"><button class="btn btn-primary">Delete</button></a>
        <hr>

    @endfor

@endsection