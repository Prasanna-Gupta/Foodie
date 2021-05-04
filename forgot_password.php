<html>
	<head>
		<title> Fast Food </title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="food.css">
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
			if ($conn->connect_error) 
			{
			  die("Connection failed: " . $conn->connect_error);
			}
			
			if(isset($_POST['forgot_pass']))
			{
				$pass=null;
				$email=$_POST['forgot_email'];
				$sql = "SELECT password FROM signin WHERE email='$email'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc()) 
					{
						$pass=$row["password"];
					}
				}
			}
		?>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class=" forgot_box">
						<i class='fas fa-user-lock icon_forgot'></i>
						<div class="forgot"><b>Forgot Password</b></div>
						<div><h4> 
							Enter your email and we'll send you a link,<br>
							to reset your password.<br>
						</h4></div>
						<form action="forgot_password.php" method="post" autocomplete="off">
							<div class="form-group">
								<div class="input-container">
									<i class="fa fa-user icon_email"></i>
									<input type="email" name="forgot_email" placeholder="customer@gmail.com" class="form-control forgot_form" required>
								</div>
							</div>
							<?php
								if(isset($_POST['forgot_pass']))
								{
									if($pass==null)
									{
							?>
							<div class="alert alert-danger text-center alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong><h4> !! Email Not Found Please Sign In !! </h4></strong>
							</div>
							<?php
									}
									else
									{
							?>
							<div class="alert alert-success text-center alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong><h4> <?php echo $pass; ?> </h4></strong>
							</div>
							<?php
									}
								}
							?>
							<div class="text-center">
								<button  type="submit" name="forgot_pass" class="forgot_btn">Submit</button>
							</div>
						</form>
						<div>
							<a href="contacts.php">
								<h4 class="link_sign"> <b> < </b>Back to Sign In </h4>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>