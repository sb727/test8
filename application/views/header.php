<!DOCTYPE html>
<html>
<head>
	<title>Example Site</title>
	<meta charset="utf-8">
	<meta name="Author" content="Johann">
	<meta name="Keywords" content="">
	<meta name="Description" content="It's my first trainning project">
	<link rel="icon" type="image/x-icon" href="http://www.example.com/CodeIgniter/CodeIgniter-3.0.5/assets/img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="http://www.example.com/CodeIgniter/CodeIgniter-3.0.5/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://www.example.com/CodeIgniter/CodeIgniter-3.0.5/assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="http://www.example.com/CodeIgniter/CodeIgniter-3.0.5/assets/css/mine.css">
	<link rel="stylesheet" type="text/css" href="http://www.example.com/CodeIgniter/CodeIgniter-3.0.5/assets/css/animate.min.css">
	<link rel="stylesheet" href="http://www.example.com/CodeIgniter/CodeIgniter-3.0.5/assets/css/jquery-ui.css">
	<script src="http://www.example.com/CodeIgniter/CodeIgniter-3.0.5/assets/js/jquery-1.12.1.min.js"></script>
	<script src="http://www.example.com/CodeIgniter/CodeIgniter-3.0.5/assets/js/jquery-ui.js"></script>
	<script>
		$(function() {
		    $("#input-text-checkin,#input-text-checkout").datepicker({
		    	dateFormat : "yy년 mm월 dd일"
		    });

		    $(".main-content").on("click","p.hotel-name",function(){
		    	console.log($(this).html());
		    });

		    $("div.main-header").on("click",".mobile-menu-toggle",function(e){
		    	e.preventDefault();
		    	$("nav#mobile-menu-01").slideToggle(1000);
		    });

			$("#move-up").on("click","#move-to-top",function(e){
				e.preventDefault();
				$("body").animate({scrollTop:0},1000);
			});

		    $("body").on("click", "input#search-btn", function(ev){
				ev.preventDefault();
				$(this).attr("disabled","disabled");
				$.ajax({
					url : "http://www.example.com/CodeIgniter/CodeIgniter-3.0.5/index.php/SiteController/?ajax=true",
					method : "POST",
					data : {description : $("input[name='description']").val()},
					dataType:"text",
					success:function(data){
						//console.log(data);
						$("div.form-group.container .row").html(data);
						$("input#search-btn").removeAttr("disabled","disabled");	
					},
					failure:function(){
						console.log("failure");
					}
				});

			});

		});
	</script>
</head>
<body>
<header id="header">
	<div class="main-header">
		<form method="POST" action="SiteController/logout">
			<input type="submit" id="logout-btn" value="log out!"></input>
		</form>
		<a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle"></a>
		<div class="container">
			<h1 class="logo">
				<a href="#">
					<img src="http://www.example.com/CodeIgniter/CodeIgniter-3.0.5/assets/img/logo.png">
				</a>
			</h1>
			<nav id="main-menu" role="navigation">
				<ul class="menu">
					<li class="menu-item-has-children active">
						<a href="#">HOME</a>
					</li>
					<li class="menu-item-has-children">
						<a href="#">SLIDERS</a>
					</li>
					<li class="menu-item-has-children">
						<a href="#">HOTELS</a>
					</li>
					<li class="menu-item-has-children">
						<a href="#">FLIGHTS</a>
					</li>
					<li class="menu-item-has-children">
						<a href="#">CARS</a>
					</li>
					<li class="menu-item-has-children">
						<a href="#">CRUISES</a>
					</li>
					<li class="menu-item-has-children">
						<a href="#">PAGES</a>
					</li>
					<li class="menu-item-has-children">
						<a href="#">SHORTCODES</a>
					</li>
				</ul>
			</nav>
		</div>
		<nav id="mobile-menu-01" class="mobile-menu collapse">
			<ul class="mobile-menu">
				<li class="menu-item-has-children active">
					<a href="#">HOME</a>
				</li>
				<li class="menu-item-has-children">
					<a href="#">SLIDERS</a>
				</li>
				<li class="menu-item-has-children">
					<a href="#">HOTELS</a>
				</li>
				<li class="menu-item-has-children">
					<a href="#">FLIGHTS</a>
				</li>
				<li class="menu-item-has-children">
					<a href="#">CARS</a>
				</li>
				<li class="menu-item-has-children">
					<a href="#">CRUISES</a>
				</li>
				<li class="menu-item-has-children">
					<a href="#">PAGES</a>
				</li>
				<li class="menu-item-has-children">
					<a href="#">SHORTCODES</a>
				</li>
			</ul>
		</nav>
	</div>							
</header>
<div class="banner">
	<div class="container">
		<p>Let's <b>Discover</b> the world together!</p>
	</div>
</div>
<div class="search">
	<div class="container">
		<div class="search-tab">
			<a href="#">HOTELS</a>
		</div>
		<div class="row form-group">
			<form class="dfd" method="POST" action="<?php $_PHP_SELF?>">
				<div class="col-sm-6 col-md-3" id="search_box">
					<h2>Where</h2>
					<p>YOUR DESTINATION</p>
					<input class="input-text" name="description" type="text" placeholder="enter a destination or hotel name"></input>
				</div>
				<div class="col-sm-6 col-md-4" id="search_box">
					<h2>When</h2>
					<div class="row">
						<div class="col-xs-6">
							<p>CHECK IN</p>
							<input id="input-text-checkin" class="input-text" type="text" placeholder="mm/dd/yy"></input>
						</div>
						<div class="col-xs-6">
							<p>CHECK OUT</p>
							<input id="input-text-checkout" class="input-text" type="text" placeholder="mm/dd/yy"></input>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3 id="search_box"">
					<h2>Who</h2>
					<div class="row">
						<div class="col-xs-4">
							<p>ROOMS</p>
							<select>
								<option>01</option>
								<option>02</option>
								<option>03</option>
							</select>
						</div>
						<div class="col-xs-4">
							<p>ADULTS</p>
							<select>
								<option>01</option>
								<option>02</option>
								<option>03</option>
							</select>
						</div>
						<div class="col-xs-4">
							<p>KIDS</p>
							<select>
								<option>01</option>
								<option>02</option>
								<option>03</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-2 id="search_box"">
					<input type="submit" id="search-btn" value="SEARCH NOW"></input>
				</div>
			</form>
		</div>		
	</div>
</div>

<div class="main-content">
	<div class="form-group container">
		<h1>Popular Destinations</h1>
		<div class="row">