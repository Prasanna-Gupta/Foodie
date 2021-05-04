<html>
	<head>
		<title> Fast Food </title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Texturina&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="fast.css">
	</head>
	<body onload="loadFunction()" style="margin:0; font-family: 'Texturina' , serif;">
		<p id="demo"></p>
		<script>
		
			function loadFunction()
			{
				var x =navigator.onLine;
				var y = new Boolean(true);
				if(x==y)
				{
					myFunction();
				}
				else
				{
					errorFunction();
				}
			}
			
			var myVar;
			
			function myFunction()
			{
				myVar = setTimeout(showPage, 5000);
			}

			function showPage() 
			{
				document.getElementById("loader").style.display = "none";
				document.getElementById("loadDiv").style.display = "block";
			}
			
			function errorFunction()
			{
				myVar = setTimeout(errorPage, 5000);
			}

			function errorPage() 
			{
				document.getElementById("loader").style.display = "none";
				document.getElementById("errorDiv").style.display = "block";
			}
		</script>
		<img src="images/food_load.gif" id="loader"></img>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "contact_db";
			
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);	

			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}
		?>
		<!-- Modal -->
		<div class="modal fade" id="foodModal" role="dialog">
			<div class="modal-dialog" style="margin-top: 225px;">
				<div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close cross" data-dismiss="modal">&times;</button>
					  <h2 class="modal-title text-center"><b>Your Items</b></h2>
					</div>
					<div class="modal-body">
					
					</div>
					<div class="modal-footer">
						<button type="button" onclick="document.location='bill.php'" class="order_btn" data-dismiss="modal">See Bill</button>
						<button type="button" class="cancel_btn" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container animate-bottom" style="display:none;" id="errorDiv">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="offline_box">
							<img src='images/error.png' class="offline_img"></img>
							<div class="offline_head"><b>You're Offline</b></div>
							<div class="offline_body"><h4> 
								Please check your internet connection<br>
								and retry again.<br>
							</h4></div>
							<div class="text-center pad_15 pad_tp_20">
								<button  type="button" name="retry" class="retry_btn" onclick="location.reload();">Retry</button>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
		
		<div class="container animate-bottom" style="display:none;" id="loadDiv">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-inverse nav">
					<div class="container-fluid container_nav">
						<div class="navbar-header">
							<a class="navbar-brand list"><img src="images/logo.jpg" class="logo"></img></a>
						</div>
						<ul class="nav navbar-nav navbar-right list">
						    <li><a href="home.php"><h3 class="card_txt">Home</h3></a></li>
						    <li><a href="about.php"><h3 class="card_txt">About Us</h3></a></li>
						    <li><a href="menu.php"><h3 class="card_txt">Our Menu</h3></a></li>
						    <li><a href="contacts.php"><h3 class="card_txt">Contact Us</h3></a></li>
						    <li><a href="#home" data-toggle="modal" data-target="#foodModal" ><h3 class="card_txt">Cart</h3></a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>