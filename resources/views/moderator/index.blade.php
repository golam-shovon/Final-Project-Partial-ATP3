<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Moderator  Dash Board</title>

    <body>
     <div class="navbar">
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
        <a href="{{route('moderator.reported_post')}}">Reported Post</a>
        <a href="{{route('moderator.unverified_post')}}">Unverfied Post</a>
        <a href="{{route('moderator.delete_post')}}">Delete Post</a>
        <a href="{{route('moderator.notice.create')}}">Notice</a>
        <a href="{{route('moderator.low_accuracy')}}">Low Acccuracy Posts</a>
    </div>
  </div> 
</div>



    	<a href="{{route('moderator.reported_post')}}">Reported Post</a>
    	<a href="{{route('moderator.unverified_post')}}">Unverfied Post</a>
    	<a href="{{route('moderator.delete_post')}}">Delete Post</a>
    	<a href="{{route('moderator.notice.create')}}">Notice</a>
        <a href="{{route('moderator.low_accuracy')}}">Low Acccuracy Posts</a>

    </body>

</html>
