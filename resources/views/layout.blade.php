<!DOCTYPE html>
<html>
<head>
	<title> Library </title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- <meta name="_token" content="{!! csrf_token() !!}"/> --}}
</head>

<body>
<!-- 	<style type="text/css">
		.form-group {
			width:600px;
		}
	</style>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
		<ul class="nav navbar-nav navbar-right">
				@if(isset(auth()->user()->name))
		        	<li> <a href="{{action('Auth\AuthController@getLogout')}}"> Log out {{auth()->user()->name }} </a> </li>
		        @else
		        	<li> <a href="{{action('Auth\AuthController@getLogin')}}"> Log in </a> </li>
		        	<li> <a href="{{action('Auth\AuthController@getRegister')}}"> Register </a> </li>
		        @endif
		      </ul>
		</div>
	</nav>
 -->	
 <div class="container">
		@yield('content')
	</div>
</body>

<script type="text/javascript">

$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

</script>

</html>