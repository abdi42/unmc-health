<!DOCTYPE html>
<html>
<title>Educational Contents</title>
<body>

<p>This category relates to:</p>
<p>{{$category->educationalcontent}}</p>
<p>{{ $category->content }}</p>
</body>
<h1>Enter Category List Form</h1>
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>
{{Form::open(array('url'=>'', 'method'=>'post'))}}
<input type="text" name="category" placeholder="category"><br><br>
{{Form::close()}}