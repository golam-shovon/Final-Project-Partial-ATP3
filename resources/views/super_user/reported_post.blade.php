<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body>
		<h2>Reported Posts </h2>
		<a href="{{route('super_user.index')}}">Back</a> 

		<table>
		@foreach($post_reports as $post_report)
			<tr>
				<td>{{$post_report->article}}</td>
				<td>{{$post_report->report}}</td>
	<form method="post">
		@csrf
				<td><input type="checkbox" name="statusyes[]" value={{$post_report->report_id }} >do not show post <input type="checkbox" name="statusno[]" value={{$post_report->report_id}} >wrong report </td>
			</tr>
		@endforeach
		<td><input type="submit" name="submit" value="Submit" /></td>
	</form>
		</table>

</body>
</html>