<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
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