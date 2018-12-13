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
		<h2>Reported Posts </h2>
		<a href="{{route('moderator.index')}}">Back</a> 
    <span>Search for articles : </span><input type="text" id="search" name="search" placeholder="type here to search"></input>

    <div></div>
	<script type="text/javascript">
		$('#search').on('keyup',function(){
			$value=$(this).val();
			$.ajax({
				type : 'get',
				url : '{{URL::to('searchValue')}}',
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
				<td>report_id</td>				
				<td>   article</td>
				<td>report</td>
			</tr>					
		@foreach($post_reports as $post_report)
			<tr>
				<td>{{$post_report->report_id}}</td>				
				<td>{{$post_report->article}}</td>
				<td>{{$post_report->report}}</td>				
	<form method="post">
		@csrf
				<td><input type="checkbox" name="statusyes[]" value={{$post_report->report_id }} >report to admin  <input type="checkbox" name="statusno[]" value={{$post_report->report_id}} >wrong report </td>
			</tr>
		@endforeach
		<td><input type="submit" name="submit" value="Submit" /></td>
	</form>
		</table>

</body>
</html>