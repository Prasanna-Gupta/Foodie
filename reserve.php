<?php include 'header.php' ?>
<?php

	$reserve = null;		
	if(isset($_POST['reserve']))
	{
		$sql = "INSERT INTO `reserve`(`name`, `mobile_number`, `guests`, `date`, `time`)
		VALUES ('".$_POST["personnm"]."','".$_POST["mobile"]."','".$_POST["guests"]."','".$_POST["date"]."','".$_POST["time"]."')";
		if ($conn->query($sql) === TRUE) {
		  $reserve=1;
		}
	}
?>
	<div class="row">
		<div class="col-md-12 text-center pad_15 ">
			<div class="call"><b>Reserve Your Table</b></div>
			<div><hr class="line_reserve"></div>
		</div>
	</div>
	<?php
	if(isset($_POST['reserve'])){
		if ($reserve==1){
	?>
		<div class="alert alert-success text-center alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong><h4> Your seats are successfully reserved. </h4></strong>
		</div>
	<?php
		} 
		else {
	?>
		<div class="alert alert-danger text-center alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong> There is an error please try again. </strong>
		</div>
	<?php
		}
	}
	?>
	<div class="row">
		<div class="col-md-6">
			<img src="images/reserve.jpeg" class="image_abt"></img>
		</div> 
		<div class="col-md-6 pad_15">
			<form action="reserve.php" method="post" autocomplete="off"> 
				<div class="form-group" style="padding-top: 15px;">
					<input type="text" name="personnm" placeholder="NAME" class="form-control contact_form" required>
				</div>
				<div class="form-group">
					<input type="number" name="mobile" placeholder="MOBILE NUMBER" class="form-control contact_form" required>
				</div>
				<div class="form-group">
					<input type="number" name="guests" placeholder="NUMBER OF GUESTS" class="form-control contact_form" required>
				</div>
				<div class="form-group">
					<input type="date" max="31" name="date" placeholder="DATE" class="form-control contact_form" required>
				</div>
				<div class="form-group">
					<input type="time" name="time" placeholder="TIME" class="form-control contact_form" required>
				</div>
				<div class="form-group text-center" style="padding-bottom: 6px;">
					<button  type="submit" name="reserve" class="form_btn">Reserve</button>
				</div>
			</form>
			<div id="googleMap" style="width:100%;height:25px;"></div>
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
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30703867.0716799!2d64.40183608457191!3d20.049158955693073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1589175546375!5m2!1sen!2sin" width="575" height="265" frameborder="0" style="border:0;border-radius:15px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</div>
<?php include 'footer.php' ?>