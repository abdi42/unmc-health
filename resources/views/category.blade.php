@extends('layouts.layout')
<!DOCTYPE html>
<html>
<title>Educational Categories</title>
<body>



<h1>Add Category</h1>
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>

<form action="/categorystore" method="post">
<div>
    {{ csrf_field() }}



    <label>    Enter the Category here: </label><br>
    <label>   <input type="text" name="category" required><br></label>


<br>    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>


</body>

</html>
