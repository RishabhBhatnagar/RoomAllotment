<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../../css/assets/demo.css">
	<link rel="stylesheet" href="../../css/assets/header-login-signup.css">
	<link rel="stylesheet" href="../../css/assets/header-user-dropdown.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

</head>
<body>
	<header class="header-login-signup">

	<div class="header-limiter">

		<h1>Room <span> Allotment</span></h1>

		<ul>
			<li><a href="#" class="selected">LogOut</a></li> 	
		</ul>

	</div>

</header>

	<div class="header-fixed-placeholder"></div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

	$(document).ready(function(){

		var showHeaderAt = 150;

		var win = $(window),
				body = $('body');

		// Show the fixed header only on larger screen devices

		if(win.width() > 600){

			// When we scroll more than 150px down, we set the
			// "fixed" class on the body element.

			win.on('scroll', function(e){

				if(win.scrollTop() > showHeaderAt) {
					body.addClass('fixed');
				}
				else {
					body.removeClass('fixed');
				}
			});

		}

	});

</script>


</body>
</html>