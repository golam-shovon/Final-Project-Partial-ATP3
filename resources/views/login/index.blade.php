<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home Page</title>

        <a href="{{route('moderator.index')}}">Modearator</a>
        <a href="{{route('super_user.index')}}">super_user</a>

</html>
