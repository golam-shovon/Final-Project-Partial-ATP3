<!DOCTYPE html>
<html>
<head>
    <meta name="_token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">


	<title>User List</title>
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="dorne-load"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg">
                        <a class="navbar-brand" href=#><img src="img/core-img/logo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                        <!-- Nav -->
                        <div class="collapse navbar-collapse" id="dorneNav">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item">
                                    <a class="nav-link" href=#>HOME <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href=#>TOUR LOCATIONS <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href=#>ARTICLES <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">CONTACT</a>
                                </li>
                            </ul>

                            @if(session()->has('user_id'))
                                <!-- Signin btn -->
                                <div class="dorne-signin-btn">
                                    <a href=#>SIGN OUT</a>
                                </div>
                            @else
                                <!-- Signin btn -->
                                <div class="dorne-signin-btn">
                                    <a href=#>SIGN IN OR REGISTER</a>
                                </div>
                            @endif
                            @if(session()->has('user_id'))
                            <!-- Add listings btn -->
                            <div class="dorne-add-listings-btn">
                                <a href=# class="btn dorne-btn">Nadimmmm</a>
                            </div>
                            @endif
                        </div>
                    </nav>
                </div>
            </div>
        </div>


    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcumb Area Start ***** -->
    <div class="breadcumb-area height-400 bg-img bg-overlay" style="background-image: url(img/bg-img/sajek.jpg)">
    </div>
	
		<h2>User List  </h2>
		<a href="{{route('super_user.index')}}">Back</a> 	
    <span>Search for Users : </span><input type="text" id="search" name="search" placeholder="type here to search"></input>

    <div id='shv'></div>
	<script type="text/javascript">
		$('#search').on('keyup',function(){
			$value=$(this).val();
			$.ajax({
				type : 'get',
				url : '{{URL::to('searchValueUser')}}',
				data:{'search':$value},
				success:function(data){
					$('#shv').html(data);
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
				<td>Number Of Articles Reports</td>
				<td><a href="{{route('super_user.user_list_sorted_comments')}}">Sort By Number of commnets</a></td>
				<td>Number Of Reported Comment</td>
				<td>Number Of Comments Reported</td>
				<td>Moderator Level</td>
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
		<?$id=$user->user_id;?>
		<td><input type="submit" name="submit" value="Increase Level" /></td>
	</form>				
			</tr>
		@endforeach		
		</table>

     @foreach($users as $user)     
    <section class="dorne-single-listing-area section-padding-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- Single Listing Content -->
                        <div class="col-12 col-lg-12">
                            <div class="single-listing-content">
                                <div class="contact-form">
                                    <h2>{{$user->name}}</h2>
                                    <h4>{{$user->id}}</h4>
                                    <h4>Number Of Articles Written: {{$users->article_written}}</h4>
                                    <h4>Number Of Articles Verified: {{$users->article_verified}}</h4>
                                    <h4>Number Of Articles Saved: {{$users->article_saved}}</h4>
                                    <h4>Number Of Articles Reported: {{$users->article_reported}}</h4>
                                    <h4>Number Of Articles Reports: {{$users->reported_article}}</h4>
                                    <h4>Number Of Commnets: {{$users->comment_number}}</h4>
                                    <h4>Number Of Reported Comments: {{$users->reported_comment}}</h4>
                                    <h4>Number Of Comments Reported: {{$users->comment_reported}}</h4>
                                    <h4>Moderator Level:{{$users->moderator_level}}</h4>
                                    <h4>    <form method="post">
                                                    @csrf
                                                    <?$id=$user->user_id;?>
                                                    <input type="submit" name="submit" value="Increase Level" />
                                            </form> 
                                    </h4>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    @endforeach
        <!-- ****** Footer Area Start ****** -->
        <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="footer-social-btns">
                        <a href="#"><i class="fa fa-linkedin" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-haspopup="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Area End ****** -->

    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/others/plugins.js"></script>
    <!-- Google Maps js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk9KNSL1jTv4MY9Pza6w8DJkpI_nHyCnk"></script>
    <script src="js/google-map/location-map-active.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
</body>
</html>