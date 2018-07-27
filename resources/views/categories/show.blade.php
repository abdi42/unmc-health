@extends('layouts.master')

@section('content')
    <title>Category List</title>
    <div class="col-sm-8">
   <br> <p>{{ $category->category }}</p>

    <a href="{{'/categories/'.$category->id.'/edit'}}"><button  class="btn btn-primary">Edit</button></a><br><br>
        <a href="{{'/categories/'.$category->id.'/delete'}}"><button class="btn btn-primary">Delete</button></a>
    <hr>
    </div>
    @endsection

