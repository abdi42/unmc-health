@extends('layouts.master')

@section('content')
<title>Edit Motivational Tips</title>




<h1>Edit Motivational Tips</h1>

<form action="/tip/{{$tips->id}}" method="post">

    {{ csrf_field() }}

    {{method_field('PUT')}}


    <label>Motivational Tip:</label><br>
    <label>   <textarea name="content" placeholder="Enter your content here" class="form-control" cols="50" rows="10" required>{{$tips->content}}</textarea><br></label>



    <br> <button type="Submit" class="btn btn-primary" value="Update">Update</button>



</form>

@endsection


