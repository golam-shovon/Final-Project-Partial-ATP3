<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
	<title>Delete Post</title>
</head>
<body>
		<h2>Delete Posts </h2>
		<a href="{{route('moderator.index')}}">Back</a> 

		<table>
		@foreach($articles as $article)
			<tr>
				<td>Report NO:</td>
				<td>{{$article->article_id }}</td>
				<td>{{$article->article}}</td>
				<td>{{$article->topic}}</td>
				<td>{{$article->type}}</td>
	<form method="post">
		@csrf
				<td><input type="checkbox" name="statusyes[]" value={{$article->article_id }} >Block </td>
			</tr>
		@endforeach
		<td><input type="submit" name="submit" value="Submit" /></td>
	</form>
		</table>
</body>
</html>