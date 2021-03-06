<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="viewport" http-equiv="Content-Type" content="width=device-width, initial-scale=1, text/html; charset=utf-8" />
		<link rel="icon" href="#">
		<title>Lecture Management System</title>

		<!---jQuery-->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

		<!---Font Awesome core css-->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>

		<!---Bootstrap core css-->
		<!---<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>-->
		<link rel="stylesheet" type="text/css" href="{{ asset('CSS/flatly.min.css') }}">

		<!---Bootstrap Javascript-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

		<!---Custom styles for this site-->
		<link rel="stylesheet" href="{{ asset('CSS/style.css') }}"/>

		<!--- Script-->
		<script type="text/javascript" src="{{ asset('Scripts/script.js') }}"></script>
	</head>
	<body>
<!---==================Navbar=====================-->
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Lecture Management System</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="{{ URL::route('home') }}">Home <span class="sr-only">(current)</span></a>
						</li>
						<li>
							<a href="{{ URL::route('about') }}">About</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Schedules <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								@if(Auth::check())
								<li>
									<a href="#">Set Profile</a>
								</li>
								<li>
									<a href="#">Lectures</a>
								</li>
								<li>
									<a href="#">Assignments</a>
								</li>
								@else
								<li>
									<a href="">Sign in</a>
								</li>
								<li>
									<a href="{{ URL::route('account-create') }}">Create account</a>
								</li>
								@endif
								
								<li class="divider"></li>
								<li>
									<a href="#">Separated link</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#">One more separated link</a>
								</li>
							</ul>
						</li>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">
							Submit
						</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						@if (!Auth::check())
						<li>
							<a  href="#signup" data-toggle="modal" data-target=".bs-modal-sm" >Login</a>
						</li>
						@endif
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Your are not logged in<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								@if(Auth::check())
								<li>
									<a href="#">Set Profile</a>
								</li>
								<li>
									<a href="#">Lectures</a>
								</li>
								<li>
									<a href="#">Assignments</a>
								</li>
								<li>
									<a href="{{ URL::route('account-sign-out') }}">Log out</a>
								</li>
								@else
								<li>
									<a href="#">Log in</a>
								</li>
								@endif
								<li class="divider"></li>
								<li>
									<a href="#">Separated link</a>
								</li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav> <!---End of navbar-->
<!---================================== End of Navbar =====================================================-->
<!---================================== Modal =============================================================-->


<div class="modal fade bs-modal-sm" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<!-- Tab headings -->
 				<ul id="myTab" class="nav nav-tabs">
						<li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
						<li class=""><a href="#signup" data-toggle="tab">Register</a></li>
				</ul>
				<!-- Tab data -->
				<div class="modal-body">
					<div class="tab-content">
						<!-- Sign Tab -->
						<div class="tab-pane fade active in" id="signin">
							<form class="form-horizontal" action="{{ URL::route('account-login-post') }}" method="post">
								<fieldset>
									<!-- Sign In Form -->
									<!-- Text input-->
									<div class="control-group">
										<label class="control-label" for="userid" focus="true">Email/Username:</label>
										<div class="controls">
											<input required="" id="email" name="email" type="text" class="form-control" class="input-medium" required="">
										</div>
										@if($errors->has('email')) 
											{{ $errors->first('email') }}
			 							@endif
									</div>
									<!-- Password input-->
									<div class="control-group">
										<label class="control-label" for="passwordinput">Password:</label>
										<div class="controls">
											<input required="" id="password" name="password" class="form-control" type="password"  class="input-medium">
										</div>
										@if($errors->has('password')) 
											{{ $errors->first('password') }}
			  							@endif
									</div>
									<br>
									<!-- Checkbox -->
									<div class="form-inline">
										<div class="control-group">
											<div class="controls">
												<label >
													<input type="checkbox" name="remember" class="form-control checkbox inline inputcheckbox" id="remember"/>
													Remember me
												</label>
											</div>
										</div>
									</div>

									<!-- Button -->
									<div class="control-group">
										<label class="control-label" for="signin"></label>
										<div class="controls">
											<button type="submit" id="signin" name="signin" class="btn btn-success">Sign In</button>
											{{ Form::token() }}
										</div>
									</div>
								</fieldset>
							</form>
						</div>
						<!-- Sign up tab -->
						<div class="tab-pane fade" id="signup">
							<form class="form-horizontal">
								<fieldset>
									<!-- Sign Up Form -->
									<!-- Text input-->
									<div class="control-group">
										<label class="control-label" for="Email" autofocus="true">Email:</label>
										<div class="controls">
											<input id="Email" name="Email" class="form-control" type="text" class="input-large" required="">
										</div>
									</div>

									<!-- Text input-->
									<div class="control-group">
										<label class="control-label" for="userid">Username:</label>
										<div class="controls">
											<input id="userid" name="userid" class="form-control" type="text" class="input-large" required="">
										</div>
									</div>

									<!-- Password input-->
									<div class="control-group">
										<label class="control-label" for="password">Password:</label>
										<div class="controls">
											<input id="password" name="password" class="form-control" type="password" class="input-large" required="">
											<em>1-8 Characters</em>
										</div>
									</div>

									<!-- Text input-->
									<div class="control-group">
										<label class="control-label" for="reenterpassword">Re-Enter Password:</label>
										<div class="controls">
											<input id="reenterpassword" class="form-control" name="reenterpassword" type="password" class="input-large" required="">
										</div>
									</div>

									<!-- Multiple Radios (inline) -->
									<br>
									<div class="form-inline">
										<div class="control-group">
											<div class="controls">
												<label >
													<input type="radio" name="humancheck" id="humancheck-0" value="robot" checked="checked"/>
													I'm a Robot
												</label>
												<br>
												<label>
													<input type="radio" name="humancheck" id="humancheck-1" value="human" />
													I'm a Human
												</label>
											</div>
										</div>
									</div>

									<!-- Button -->
									<div class="control-group">
										<label class="control-label" for="confirmsignup"></label>
										<div class="controls">
											<button id="confirmsignup" name="confirmsignup" class="btn btn-success">Sign Up</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				<center>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</center>
			</div>
		</div>
	</div>
</div>
<!---=============================== End of Login Model ================================================-->
	@if(Session::has('global'))
		<div class="alert alert-info alert-dismissable" role="alert">
			 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			 {{ Session::get('global') }}
		</div>
	@endif
	
	<!-- Page content goes here -->
	@yield('content')
<!---================================== Footer ============================================================-->
<footer class="footer">
	<hr>
	<div class="container-fluid">
		<div class="navbar navbar-default navbar-fixed-bottom">
			<p class="navbar-text pull-left">© 2014 - <a href="{{ URL::route('home') }}">LMS</a>
			</p>
			<a href="#" class="navbar-btn btn-danger btn pull-right">
				<span class="glyphicon glyphicon-youtube"></span>  Subscribe on YouTube</a>
			</div>
	</div>
</footer>
<!---================================== End Footer =========================================================-->
</body>
</html>
