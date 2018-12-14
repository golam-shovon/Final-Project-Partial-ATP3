<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>	
	<title>Details</title>
</head>
<body>
    <span>Search for notices : </span><input type="text" id="search" name="search" placeholder="type here to search"></input>

    <div></div>
	<script type="text/javascript">
		$('#search').on('keyup',function(){
			$value=$(this).val();
			$.ajax({
				type : 'get',
				url : '{{URL::to('searchValueNotice')}}',
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
				<td>Notice Id</td>
				<td>Notice Title</td>				
				<td>Notice</td>
				<td>Date</td>				
			</tr>					
		@foreach($notices as $notice)
			<tr>
				<td>{{$notice->notice_id}}</td>				
				<td>{{$notice->notice_title}}</td>
				<td>{{$notice->notice}}</td>
				<td>{{$notice->created_at}}</td>
	<form method="post">
		@csrf
				<td><input type="checkbox" name="statusyes[]" value={{$notice->notice_id }} >Delete </td>
			</tr>
		@endforeach
		<td><input type="submit" name="submit" value="Submit" /></td>
	</form>					
	</table>

</body>
</html>			