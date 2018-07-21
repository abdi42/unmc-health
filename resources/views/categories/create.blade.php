@extends('layouts.master')


@section('content')

    <title>Create Category</title>
<h1>Add Category</h1>


<form action="/categories" method="post">
<div>
    {{ csrf_field() }}


<div class="form-group">
        Enter the Category here: <br><br>
      <input type="text" name="category" class="form-control"required><br>
</div>

<br>    <button type="submit" class="btn btn-primary">Save</button>

    @include('layouts.errors')
</div>
</form>



@endsection

