@extends('layouts.master')


@section('content')

<title>Educational Contents</title>

<br><h1>Add Educational Content</h1>


<form action="/contents" method="post">
<div>
    {{ csrf_field() }}

    <p>Title</p>
    <input type="text" name="title" placeholder="Enter your title here" class="form-control" required><br>

    <p>Select Category</p>
    <select name="category_id"  >
        @foreach($categories as $category)
            <option value="{{ $category->id }}" >{{ $category->category }}</option>
        @endforeach
    </select><br><br>

    <p>Enter the Content here: </p>
     <textarea name="content" placeholder="Enter your content here" class="form-control" cols="30" rows="10" required></textarea><br><br>


 <br>  <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>


@endsection
