<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>		
	<title>User List Article Reported </title>
</head>
<body>
		<h2>User List Article Reported </h2>
		<a href="{{route('super_user.index')}}">Back</a> 	
    <span>Search for Users : </span><input type="text" id="search" name="search" placeholder="type here to search"></input>

    <div></div>
	<script type="text/javascript">
		$('#search').on('keyup',function(){
			$value=$(this).val();
			$.ajax({
				type : 'get',
				url : '{{URL::to('searchValueUser')}}',
				data:{'search':$value},
				success:function(data){
					$('div').html(data);
				}
			});
		})
	</script>

	<script type="text/javascript">
		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
	</script>	
		<table>
			<tr>
				<td></td>
				<td></td>
				<td><a href="{{route('super_user.user_list_sorted_articlewritten')}}">Sort By Article Writtenn</a></td>
				<td><a href="{{route('super_user.user_list_sorted_articleverified')}}">Sort By Article Verified</a></td>
				<td></td>
				<td><a href="{{route('super_user.user_list_sorted_articlereported')}}">Sort By Article Reported</a></td>
				<td></td>
				<td><a href="{{route('super_user.user_list_sorted_comments')}}">Sort By Number of commnets</a></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>			
			<tr>
				<td>ID</td>
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
				<td>{{$user->user_id}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->article_written}}</td>
				<td>{{$user->article_verified}}</td>
				<td>{{$user->article_saved}}</td>
				<td>{{$user->article_reported}}</td>
				<td>{{$user->reported_article}}</td>		
				<td>{{$user->comment_number}}</td>
				<td>{{$user->reported_comment}}</td>
				<td>{{$user->comment_reported}}</td>
				<td>{{$user->moderator_level}}</td>
	<form method="post">
		@csrf
		@php($id=$user->user_id)@endphp
		<td><input type="submit" name="submit" value="Increase Level" /></td>
	</form>				
			</tr>
		@endforeach		
		</table>

</body>
</html>