<?php include 'header.php' ?>
<?php

	$message = 0;
	$sign = 0;
	$count=0;
	$pass=0;
	$check=0;
	
	if(isset($_POST['Save']))
	{
		$sql = "INSERT INTO `msg`(`name`, `country`, `city`, `mobile_number`, `message`)
		VALUES ('".$_POST["name"]."','".$_POST["country"]."','".$_POST["city"]."','".$_POST["mobile"]."','".$_POST["message"]."')";
		if ($conn->query($sql) === TRUE) 
		{
		  $message=1;
		}
	}
	
	if(isset($_POST['SignIn']))
	{
		$email=$_POST['email'];
		$password=$_POST['pass1'];
		$sql = "SELECT * FROM signin";
		$result = $conn->query($sql);
		if($_POST["pass2"]==$_POST["pass1"])
		{
			$pass=1;
		}
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				if($pass==1)
				{
					if((($email)!=($row["email"]))&&(($password)!=($row["password"])))
					{
						$check=1;
					}
					else if(($email)==($row["email"]))
					{
						$check=2;
					}
				}
				else
				{
					break;
				}
			}
		}
		if($check==1)
		{
			$sql = "INSERT INTO `signin`(`email`, `password`, `check_password`)
			VALUES ('".$_POST["email"]."','".$_POST["pass1"]."','".$_POST["pass2"]."')";
			if ($conn->query($sql) === TRUE) 
			{
				$sign=1;
			}
		}
		else if($check==2)
		{
			$count=1;
		}
	}
?>
	<!-- Modal -->
	<form action="contacts.php" method="post" autocomplete="off">
		<div class="modal fade" id="signModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close cross" data-dismiss="modal">&times;</button>
					  <h2 class="modal-title text-center"><b>Sign In</b></h2>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group text-left">
									<div><h4><b> E-mail :</b></h4></div>
									<input type="email" id="email" name="email" placeholder="Enter Email" class="form-control contact_form" required>
									<br>
								</div>
								<div class="form-group text-left">
									<div><h4><b> Password :</b></h4></div>
									<input type="password" id="pswd" name="pass1" placeholder="Enter Password" class="form-control contact_form" required>
								</div>
								<div class="form-group text-right">
									<input type="checkbox" onclick="showFunction1()">Show Password
									<br>
								</div>
								<div class="form-group text-left">
									<div><h4><b> Repeat Password :</b></h4></div>
									<input type="password" id="rpswd" name="pass2" placeholder="Re-enter Password" class="form-control contact_form" required>
								</div>
								<div class="form-group text-right">
									<input type="checkbox" onclick="showFunction2()">Show Password
									<br>
								</div>
								<script>
									function showFunction1()
									{
										var x=document.getElementById("pswd");
										if (x.type === "password") 
										{
											x.type = "text";
										} 
										else 
										{
											x.type = "password";
										}
									}
									
									function showFunction2()
									{
										var y=document.getElementById("rpswd");
										if (y.type === "password") 
										{
											y.type = "text";
										} 
										else 
										{
											y.type = "password";
										}
									}
								</script>
								<div class="form-group text-left">
									<h4> 
										<input type="checkbox" checked="checked" name="remember">Remember me
									</h4>
									<br>
								</div>
								<div>
									<h4>By creating an account you agree to our 
									<a href="#" style="color:dodgerblue">Terms & Privacy</a>.</h4>
									<br>
								</div>
								<div>
									<h4 class="text-left"><a href="forgot_password.php">Forgot Password?</a>.</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" name="SignIn" class="order_btn">Sign In</button>
						<button type="button" class="cancel_btn" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<div>
		<?php
		if(isset($_POST['Save'])){
			if ($message==1){
		?>
			<div class="alert alert-success text-center alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><h4> Message successfully sent. </h4></strong>
			</div>
		<?php
			} 
			else {
		?>
			<div class="alert alert-danger text-center alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><h4> There is an error please try again. </h4></strong>
			</div>
		<?php
			}
		}
		?>
	</div>
	<div>
		<?php
		if(isset($_POST['SignIn']))
		{
			if ($sign==1)
			{
		?>
			<div class="alert alert-success text-center alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><h4> You are successfully signed in. </h4></strong>
			</div>
		<?php 
			}
			else if($count==1)
			{
		?>
			<div class="alert alert-info text-center alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><h4> You are already signed in. </h4></strong>
			</div>
		<?php 
			}
			else if($pass==0)
			{
		?>
			<div class="alert alert-warning text-center alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><h4> Please re-check your password. </h4></strong>
			</div>
		<?php
			} 
			else
			{
		?>
			<div class="alert alert-danger text-center alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><h4> There is an error please try again. </h4></strong>
			</div>
		<?php
			}
		}
		?>
	</div>
	<div class="row">
		<div class="col-md-12 text-center pad_15 ">
			<div class="varity"><b>Welcome To Food World</b></div>
			<div><hr class="line_varity"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 text-center">
			<i class="material-icons icons">place</i>
			<div><b><h3> Our Address </h3></b></div>
			<div><h4> 620/158,'W' block,<br>Keshav Nagar,Kanpur. </h4></div>
		</div>
		<div class="col-md-4 text-center">
			<i class="material-icons icons">event</i>
			<div><b><h3> Reserve Your Table </h3></b></div>
			<div><h4> +91 829 982 9223 <br> 
			Click on the link to reserve your table<br>
			<a href="reserve.php"> reserve_your_table </a> </h4></div>
		</div>
		<div class="col-md-4 text-center">
			<i class="material-icons icons">query_builder</i>
			<div><b><h3> Opening Hours </h3></b></div>
			<div><h4> Mon-Sat : 6a.m. to 10p.m.<br>
			Sun : 9a.m. to 9p.m. </h4></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center pad_15 ">
			<div class="call"><b>Call Us</b></div>
			<div><hr class="line_call"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center pad_15 ">
			<div class="contact_text">
				<b>Send us a message and we’ll get back to you as soon as possible. 
				You can also reach us by phone at (+91)829 982 9223. Looking forward to hearing from you.</b>
			</div>
		</div>
	</div>
	<form action="contacts.php" method="post" autocomplete="off">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<input type="text" name="name" placeholder="Enter your name" class="form-control contact_form" required>
				</div>
				<div class="form-group">
					<input type="text" name="country" placeholder="Enter your country" class="form-control contact_form" required>
				</div>
				<div class="form-group">
					<input type="text" name="city" placeholder="Enter your city" class="form-control contact_form" required>
				</div>
				<div class="form-group">
					<input type="number" maxlength="10" name="mobile" placeholder="Enter your mobile number" class="form-control contact_form" required>
				</div>
				<div class="form-group">
					<textarea name="message" placeholder="Enter your message" class="form-control contact_form" required></textarea>
				</div>
				<div class="form-group text-center form_pad">
					<button  type="submit" name="Save" class="form_btn">Send</button>
				</div>
			</div>
		</div>
	</form>
	<div class="text-center row">
		<div class="col-md-5">
			<hr class="line_bill">
		</div>
		<div class="col-md-2">
			<div class="btn_text"><b> OR </b></div>
		</div>
		<div class="col-md-5">
			<hr class="line_bill">
		</div>
	</div>
	<div class="text-center">
		<button  type="submit" name="SignUp"  data-toggle="modal" data-target="#signModal" class="form_btn">Sign In</button>
	</div>
	<div class="row">
		<div class="col-md-12 text-center pad_15 ">
			<div class="call"><b>Find Us</b></div>
			<div><hr class="line_call"></div>
		</div>
	</div>
	<div id="googleMap" style="width:100%;"></div>
		<script>
			function myMap() {
			var mapProp= {
			  center:new google.maps.LatLng(51.508742,-0.120850),
			  zoom:5,
			};
			var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
			}
			var marker = new google.maps.Marker({position:myCenter,animation:google.maps.Animation.BOUNCE});
			marker.setMap(map);
		</script>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30703867.0716799!2d64.40183608457191!3d20.049158955693073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1589175546375!5m2!1sen!2sin" width="100%" height="80%" frameborder="0" style="border:0;border-radius:15px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
<?php include 'footer.php' ?> 