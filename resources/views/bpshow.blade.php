<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>

<p>BP Information</p>
@foreach($musers as $user)


    <li>

        <a href="/bps/{{$user->userid}}">{{$user->userid}}</a></li>

@endforeach





</body>
</html>