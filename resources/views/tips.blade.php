@extends('layouts.layout')

        <!DOCTYPE html>
<html>
<title>Motivational Tips</title>
<body>



<br><h1>Add Motivational Tips</h1>
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>

<form action="/tipstore" method="post">

    {{ csrf_field() }}

<br>    <label><b>Tip Content:</b></label><br><br>
    <label><textarea name="content" placeholder="Enter the Tip Content here" cols="30" rows="10" required></textarea></label><br><br>

    <label>Enter Creation Date:</label><br>
    <label><input type="date" placeholder="Enter the date here" name="creation_date" required></label><br>

    <label>Enter Creation Time:</label><br>
    <label><input type="time" placeholder="Enter the time here" name="creation_time" required></label><br>


    <br>  <button type="submit" class="btn btn-primary">Save</button>

</form>


</body>

</html>