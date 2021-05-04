<html>
	<head>
		<title> Fast Food </title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="fast_food.css">
	</head>
	<body style="margin:0; font-family: cursive;">
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
		<div class="container ">
			<div class="row">
				<div class="col-md-12 pad_15">
					<img src="images/india_head.jpg" class="image"></img>
					<div class="centered" style="font-size: 40px;">
						<div>
							<b style="font-size: 60px; padding-left: 110px;"><i> FAST FOOD </i></b><br>
							<b style="font-size: 64px;">F</b>ind the best restaurants, cafés <br>
							and bars in <b style="font-size: 64px;">INDIA </b>
						</div>
					</div>
				</div>
			</div>
			<div class="row pad_tp_20">
				<div class="col-md-12 foot">
					<div class="text-center"><b>COPYRIGHTED BY DEVIL</b></div>
				</div>
			</div>
		</div>
	</body>
</html>