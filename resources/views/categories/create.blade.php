@extends('layouts.master')


@section('content')

    <title>Create Category</title><br>
<h1>Add a Category</h1><br>


<form action="/categories" method="post">
<div>
    {{ csrf_field() }}


<div class="form-group">
        Enter the Category here: <br><br>
      <input type="text" name="category" class="form-control" required><br>
</div>

<br>    <button type="submit" class="btn btn-primary">Save</button>&nbsp;

    <input type="button" name="cancel" value="Cancel" class="btn btn-primary"onclick="window.location='{{ url("/categories") }}'" />

    @include('layouts.errors')
</div>
</form>



@endsection

