@extends('layouts.layout')


<!DOCTYPE html>
<html>
<title>Educational Contents</title>
<body>



<h1>Add Educational Content</h1>
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>

<form action="/contentstore" method="post">
<div>
    {{ csrf_field() }}
    @section('editMethod')
    @show
    <label>Title:</label><br>
    <label><input type="text" name="title" placeholder="title" value="@yield('editTitle')" required></label><br>


    <label>Select Category:</label><br>
    <label>  <select name="category">
            @foreach($categories as $category)
                <option value="{{ $category }}">{{ $category }}</option>
            @endforeach
        </select></label><br><br>

    <label>    Enter the Content here: </label><br>
    <label>   <textarea name="content" placeholder="content" cols="30" rows="10" required>@yield('editBody')</textarea><br><br></label>


 <br>  <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>


</body>

</html>
