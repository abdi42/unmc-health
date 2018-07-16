
<!DOCTYPE html>
<html>
<title>Educational Contents</title>
<body>



<h1>Edit Contents</h1>
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>

<form action="/educationalcontent/{{$content->id}}" method="post">

    {{ csrf_field() }}
    {{method_field('PUT')}}
    <label>Title:</label>
    <label><input type="text" name="title" placeholder="title"  required></label><br><br>


    <label>Select Category:</label>
    <label>  <select name="category">
            @foreach($categories as $category)
                <option value="{{ $category }}">{{ $category }}</option>
            @endforeach
        </select></label>

    <label>    Enter the Content here: </label>
    <label>   <textarea name="content" placeholder="content" cols="30" rows="10" required></textarea><br><br></label>

    <input type="submit" value="Update">

</form>


</body>

</html>
