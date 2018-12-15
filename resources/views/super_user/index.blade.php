<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Super User  Dash Board</title>

    <body>
    	<a href="{{route('super_user.reported_post')}}">Reported Post</a>
    	<a href="{{route('super_user.unverified_post')}}">Unverfied Post</a>
    	<a href="{{route('super_user.delete_post')}}">Delete Post</a>
    	<a href="{{route('super_user.notice')}}">Notice</a>
        <a href="{{route('super_user.low_accuracy')}}">Low Acccuracy Posts</a>
        <a href="{{route('super_user.comment_report')}}">Comment Reports</a>
        <a href="{{route('super_user.user_list')}}">User List</a>
    </body>

</html>
