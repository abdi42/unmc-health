@extends('layouts.master')

@section('content')
    <title>Confirm Delete</title>
    <br> <h1>Delete Educational Category</h1><br>
    <h3>Are you sure you want to delete?</h3>
    <p>{{ $categories->category }}</p>

    <form action="{{'/categories/'. $categories->id}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}

        <br><a href="{{'/categories/'.$categories->id}}"><button class="btn btn-primary">Delete</button></a>&nbsp;
        <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/categories") }}'" />
    </form>

    <hr>



@endsection
