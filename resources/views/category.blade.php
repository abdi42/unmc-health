
<!DOCTYPE html>
<html>
<title>Educational Categories</title>
<body>



<h1>Enter the Categories to add</h1>
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>

<form action="/categorystore" method="post">

    {{ csrf_field() }}

    <label>Select Educational Content</label>
    <label>  <select name="educationalcontent_id">
            @foreach($contents as $content)
                <option value="{{ $content->id }}">{{ $content->title }}</option>
            @endforeach
        </select></label>

    <label>    Enter the Category here: </label>
    <label>   <input type="text" name="category" required><br><br></label>

    <input type="submit" value="Save">

</form>


</body>

</html>
