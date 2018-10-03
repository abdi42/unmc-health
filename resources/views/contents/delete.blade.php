@extends('layouts.dashboard')

@section('content')
    <title>Confirm Delete</title>
    <br> <h1>Delete Educational Content</h1><br>
    <h3>Are you sure you want to delete?</h3>
    <p>{{ $content->title }}</p>

    <form action="{{'/contents/'. $content->id}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}

        <br><a href="{{'/contents/'.$content->id}}"><button class="btn btn-primary">Delete</button></a>&nbsp;
        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/contents") }}'" />
    </form>

    <hr>



@endsection
