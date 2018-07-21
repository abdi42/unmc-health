
@extends('layouts.master')
<!DOCTYPE html>
<html>
<head>
    <title>Weight Information</title>
</head>

<body>

<p>Weight Information</p>
@foreach($subjects as $subject)


    <li>

        <a href="/weights/{{$subject->userid}}">{{$subject->userid}}</a></li>

@endforeach





</body>
</html>