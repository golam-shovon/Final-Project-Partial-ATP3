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
				<td>Number Of Articles Verified</td>
				<td>Number Of Articles Saved</td>
				<td>Number Of Articles Reported</td>
				<td>Number Of Articles Reports</td>
				<td>Number Of Comments</td>
				<td>Number Of Reported Comment</td>
				<td>Number Of Comments Reported</td>
				<td>Moderator Level</td>
			</tr>
		@foreach($users as $user)
			<tr>
				<td>{{$user->name}}</td>
				@php($id=$user->user_id)
				<td>{{$user->article_written}}</td>
				<td>{{$user->article_verified}}</td>
				<td>{{$user->article_saved}}</td>
				<td>{{$user->article_reported}}</td>
				<td>{{$user->reported_article}}</td>		
				<td>{{$user->commnent_number}}</td>
				<td>{{$user->reported_comment}}</td>
				<td>{{$user->comment_reported}}</td>
				<td>{{$user->moderator_level}}</td>
				<td><a href="{{route('super_user.increase_limit')}}">Increase Moderator Level</a></td>
			</tr>
		@endforeach		
		</table>

</body>
</html>