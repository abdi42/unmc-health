@extends('layouts.master')

<!DOCTYPE html>
<html>
<head>
    <title>Blood Pressure Information</title>
</head>

<body>

<p>BP Information</p>
@foreach($subjects as $subject)


    <li>

        <a href="/bloodpressures/{{$subject->userid}}">{{$subject->userid}}</a></li>

@endforeach





</body>
</html>