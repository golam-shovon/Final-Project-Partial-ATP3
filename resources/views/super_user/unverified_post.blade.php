<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body>
		<h2>Reported Posts </h2>
		<a href="{{route('super_user.index')}}">Back</a> 

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
				<td><input type="checkbox" name="statusyes[]" value={{$article->article_id }} >verify  <input type="checkbox" name="statusno[]" value={{$article->article_id}} >refute </td>
			</tr>
		@endforeach
		<td><input type="submit" name="submit" value="Submit" /></td>
	</form>
		</table>

</body>
</html>