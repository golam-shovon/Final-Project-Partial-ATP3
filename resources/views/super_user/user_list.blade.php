<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body>
		<h2>User LIst  </h2>
		<a href="{{route('super_user.index')}}">Back</a> 

		<table>
			<tr>
				<td>Name</td>
				<td>Number Of Articles Written</td>
				<td>Number Of Articles Saved</td>
			</tr>
		@foreach($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->article}}</td>
				<td>{{$user->article_saved}}</td>
		
			</tr>
		@endforeach		
		</table>

</body>
</html>