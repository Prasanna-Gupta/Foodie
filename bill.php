<?php include 'header.php' ?>
<?php
	
	$bill=0;
	
	if(isset($_POST['pay_bill']))
	{
		$sql = "INSERT INTO `bill`(`name`, `email`, `address`, `city`, `state` `zip` `card_name` `card_number` `exp_month` `exp_year` `cvv`)
		VALUES ('".$_POST["firstname"]."','".$_POST["email"]."','".$_POST["address"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip"]."','".$_POST["cardname"]."','".$_POST["cardnumber"]."','".$_POST["expmonth"]."','".$_POST["expyear"]."','".$_POST["cvv"]."')";
		if ($conn->query($sql) === TRUE) 
		{
		  $bill=1;
		}
	}
?>
	<div class="row_bill">
		<div class="col-75">
			<div class="container_bill">
				<form action="bill.php" method="post" autocomplete="off">
					<div class="row_bill text-left">
						<div class="col-50">
							<h2>Billing Address</h2><br>
							<label for="fname"><i class="fa fa-user icon_bill "></i> Full Name</label>
							<input type="text" name="firstname" placeholder="John M. Doe" class="check_form_text" required>
							<label for="email"><i class="fa fa-envelope icon_bill "></i> Email</label>
							<input type="email" name="email" placeholder="john@example.com" class="check_form_text" required>
							<label for="adr"><i class="fa fa-address-card-o icon_bill "></i> Address</label>
							<input type="text" name="address" placeholder="542 W. 15th Street" class="check_form_text" required>
							<label for="city"><i class="fa fa-institution icon_bill "></i> City</label>
							<input type="text" name="city" placeholder="New York" class="check_form_text" required>
							<div class="row_bill">
								<div class="col-50">
									<label for="state">State</label>
									<input type="text" name="state" placeholder="NY" class="check_form_text" required>
								</div>
								<div class="col-50">
									<label for="zip">Zip</label>
									<input type="text" name="zip" placeholder="10001" class="check_form_text" required>
								</div>
							</div>
						</div>
						<div class="col-50">
							<h2>Payment</h2><br>
							<label for="fname">Accepted Cards</label>
							<div class="icon-container">
							  <i class="fa fa-cc-visa icon_card" style="color:navy;"></i>
							  <i class="fa fa-cc-amex icon_card" style="color:blue;"></i>
							  <i class="fa fa-cc-mastercard icon_card" style="color:red;"></i>
							  <i class="fa fa-cc-discover icon_card" style="color:orange;"></i>
							</div>
							<label for="cname">Name on Card</label>
							<input type="text" name="cardname" placeholder="John More Doe" class="check_form_text" required>
							<label for="ccnum">Credit card number</label>
							<input type="text" name="cardnumber" placeholder="1111-2222-3333-4444" class="check_form_text" required>
							<label for="expmonth">Exp Month</label>
							<input type="text" name="expmonth" placeholder="September" class="check_form_text" required>
							<div class="row_bill">
								<div class="col-50">
									<label for="expyear">Exp Year</label>
									<input type="text" name="expyear" placeholder="2018" class="check_form_text" required>
								</div>
								<div class="col-50">
									<label for="cvv">CVV</label>
									<input type="text" name="cvv" placeholder="352" class="check_form_text" required>
								</div>
							</div>
						</div>
					</div>
					<label class="text-left">
						<h4>
							<input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
						</h4>
					</label>
					<div class="form-group text-center form_pad">
						<button  type="submit" name="pay_bill" class="btn">Continue to place Order</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-25">
			<div class="container_cart text-left">
				<h3>Cart
					<span class="price" style="color:black">
						<i class="fa fa-shopping-cart icon_bill"></i>
						<b>4</b>
					</span>
				</h3>
				<p><b>Product 1</b><span class="price">$15</p>
				<p><b>Product 2</b><span class="price">$5</p>
				<p><b>Product 3</b><span class="price">$8</p>
				<p><b>Product 4</b><span class="price">$2</p>
				<hr class="line_bill">
				<p><b>Total</b><span class="price">$30</p>
			</div>
			<?php
				if(isset($_POST['pay_bill'])){
					if ($bill==1){
			?>
				<div class="alert alert-success text-center alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><h4> Receive your meal in time. </h4></strong>
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
	</div>
<?php include 'footer.php' ?>