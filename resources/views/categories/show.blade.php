@extends('layouts.master')

@section('content')
    <title>Category List</title>
    <div class="col-sm-8">
    <p>{{ $category->category }}</p>

    <a href="{{'/categories/'.$category->id.'/edit'}}"><button  class="btn btn-primary">Edit</button></a><br>
    <form action="{{'/categories/'. $category->id}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}

        <br><a href="{{'/categories/'.$category->id}}"><button class="btn btn-primary">Delete</button></a>
    </form>
    </div>
    @endsection

