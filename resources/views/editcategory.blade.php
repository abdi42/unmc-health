@extends('layouts.layout')
<!DOCTYPE html>
<html>
<title>Edit Educational Categories</title>
<body>



<h1>Enter the Categories to add</h1>
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>

<form action="/educationalcontentcategories/{{$categories->id}}" method="post">

    {{ csrf_field() }}

    {{method_field('PUT')}}

    <label>Select Educational Content ID</label><br><br>
    <label>  <select name="educationalcontent_id">
            @foreach($contents as $content)
                <option value="{{ $content->id }}">{{ $content->title }}</option>
            @endforeach
        </select></label><br><br>

    <label>    Edit the Category here: </label><br><br>
    <label>   <input type="text" name="category" required><br><br></label>


    <button type="submit" class="btn btn-primary">Update</button>

</form>


</body>

</html>
