<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notice Create</title>
</head>
<body>
    <a href="{{route('super_user.index')}}">Back</a> 
    @if(session()->has('user_id'))
    <div id="notice_post">
        <form method='post'>
            @csrf
            <textarea rows="1" style='width:100%' name='notice_title' placeholder='Title of the Notice' required></textarea><br>
            <textarea rows="4" style='width:100%' name='notice' placeholder='Write the Notice here' required></textarea>
            <br>
            <input type='submit' name='post' value='POST'>
        </form>
    </div>
    @endif
</body>

</html>