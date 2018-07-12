<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>

<p>BG Information</p>
@foreach($musers as $user)


    <li>

        <a href="/bgs/{{$user->userid}}">{{$user->userid}}</a></li>

@endforeach





</body>
</html>