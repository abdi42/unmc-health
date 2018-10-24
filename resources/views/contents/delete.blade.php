@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'HINTS' => '/contents',
    'Remove' => null
  ]
])

@section('content')
    <title>Confirm Delete</title>
    <br> <h1>Delete HINT</h1><br>
    <h3>Are you sure you want to delete?</h3>
    <p>{{ $content->category->category}} #{{$content->id}}</p>
    <p>{{$content->content}}</p>
    <form action="{{'/contents/'. $content->id}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}

        <p><strong>This CANNOT be undone.</strong></p>

        <br><a href="{{'/contents/'.$content->id}}"><button class="btn btn-primary">Yes</button></a>&nbsp;
        <input type="button" name="cancel" value="No, do not delete HINT {{$content->category->category}} #{{$content->id}}" class="btn btn-primary"onclick="window.location='{{ url("/contents") }}'" />
    </form>

    <hr>



@endsection
