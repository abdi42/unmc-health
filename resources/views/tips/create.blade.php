@extends('layouts.master')


@section('content')
<title>Motivational Tips</title>




<br><h1>Add Motivational Tips</h1>

<div class="form-group">
<form action="/tips" method="post">



    {{ csrf_field() }}
<div>
<br>    <label><b>Tip Content:</b></label><br>
    <label><textarea name="content" placeholder="Enter the Tip Content here" class="form-control" cols="50" rows="10"  required></textarea></label><br><br>




    <br>  <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
</div>

@endsection
