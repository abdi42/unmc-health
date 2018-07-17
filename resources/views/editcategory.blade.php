@extends('layouts.layout')
<!DOCTYPE html>
<html>
<title>Edit Educational Categories</title>
<body>



<br><h1>Edit the Category</h1><br><br>
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>

<form action="/educationalcontentcategories/{{$categories->id}}" method="post">

    {{ csrf_field() }}

    {{method_field('PUT')}}



    <label>    Edit the Category here: </label><br><br>
    <label>   <input type="text" name="category" required><br><br></label>


   <br> <button type="submit" class="btn btn-primary">Update</button>

</form>


</body>

</html>
