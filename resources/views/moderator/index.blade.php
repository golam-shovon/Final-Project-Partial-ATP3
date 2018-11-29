<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Moderator  Dash Board</title>

    <body>
    	<a href="{{route('moderator.reported_post')}}">Reported Post</a>
    	<a href="{{route('moderator.unverified_post')}}">Unverfied Post</a>
    	<a href="{{route('moderator.delete_post')}}">Delete Post</a>
    </body>

</html>
