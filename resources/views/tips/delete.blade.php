@extends('layouts.master')

@section('content')
    <title>Confirm Delete</title>
   <br> <h1>Delete Motivational Tip</h1><br>
    <h3>Are you sure you want to delete?</h3>
    <p>{{ $tips->content }}</p>

    <form action="{{'/tip/'. $tips->id}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <a href="{{'/tip/'.$tips->id}}"><button class="btn btn-primary">Delete</button></a>&nbsp;
        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/tips") }}'" />
    </form>

    <hr>



@endsection


