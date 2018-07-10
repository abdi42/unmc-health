<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Send Mail</h1>
<form action="/send" method="post">
    {{csrf_field()}}
    to: <input type="text" name="to">
    message: <textarea name="message"></textarea>
    <input type="submit" value="Send">
</form>

</body>
</html>