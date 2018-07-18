@extends('layouts.layout')
        <!DOCTYPE html>
<html>
<title>Edit Motivational Tips</title>
<body>



<h1>Edit Motivational Tips</h1>
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>

<form action="/tip/{{$tips->id}}" method="post">

    {{ csrf_field() }}
    {{method_field('PUT')}}
    <label>Motivational Tip:</label><br><br>
    <label>   <textarea name="content" placeholder="Enter your content here" cols="30" rows="10" required></textarea><br><br></label>

 <br>   <label>Edit Creation Date:</label><br>
    <label><input type="date" placeholder="Enter the date here" name="creation_date" required></label><br>

 <br>   <label>Edit Creation Time:</label><br>
    <label><input type="time" placeholder="Enter the time here" name="creation_time" required></label><br>

    <br> <button type="Submit" class="btn btn-primary" value="Update">Update</button>

</form>


</body>

</html>