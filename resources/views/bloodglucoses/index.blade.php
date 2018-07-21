@extends('layouts.master')
<!DOCTYPE html>
<html>
<head>
    <title>Blood Glucose Information</title>
</head>

<body>

<p>BG Information</p>
@foreach($subjects as $subject)


    <li>

        <a href="/bloodglucoses/{{$subject->userid}}">{{$subject->userid}}</a></li>

@endforeach


</body>
</html>