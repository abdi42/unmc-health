@extends('layouts.master')

@section('content')
    <title>Edit Educational Categories</title>




<br><h1>Edit the Category</h1><br>


<form action="/categories/{{$categories->id}}" method="post">


    {{ csrf_field() }}

    {{method_field('PUT')}}



 <p>Edit the Category here:</p>
    <input type="text" name="category" class="form-control" value="{{ $categories->category }}"required><br>


   <br> <button type="submit" class="btn btn-primary">Update</button> &nbsp;
    <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/categories") }}'" />

</form>

@endsection



