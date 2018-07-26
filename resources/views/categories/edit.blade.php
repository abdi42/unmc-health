@extends('layouts.master')

@section('content')
    <title>Edit Educational Categories</title>




<h1>Edit the Category</h1><br><br>


<form action="/categories/{{$categories->id}}" method="post">


    {{ csrf_field() }}

    {{method_field('PUT')}}



   Edit the Category here: <br>
    <input type="text" name="category" class="form-control" value="{{ $categories->category }}"required><br>


   <br> <button type="submit" class="btn btn-primary">Update</button> &nbsp;
    <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/categories") }}'" />

</form>

@endsection



