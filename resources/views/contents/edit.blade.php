@extends('layouts.master')


@section('content')
<title>Educational Contents</title>

<br><h1>Edit Contents</h1>


<form action="/contents/{{$content->id}}" method="post">

    {{ csrf_field() }}
    {{method_field('PUT')}}

  <p>Title<br></p>
    <input type="text" name="title" placeholder="title" value="{{$content->title}}" class="form-control" required><br><br>


    <p>Select Category</p>
    <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select><br>

<br>      Enter the Content here<br><br>
       <textarea name="content" placeholder="content" class="form-control" cols="30" rows="10" required>{{$content->content}}</textarea><br><br></label>


<br> <button type="Submit" class="btn btn-primary" value="Update">Update</button>

</form>

    @endsection


