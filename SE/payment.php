
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>

<div class="row container-fluid bg-light" id="header">
	<div class="col-sm-3 text-center"><img src="res/SBI.png" style="width: 50%; margin-top: 3%;"></div>
	<div class="col-sm-6 text-center">
		<h1 style=" margin-top: 3%;"><strong>State Bank Of India</strong></h1>
		<h3>Payment Portal</h3>
		<div class="alert alert-primary">Payment API is not yet added</div>
	</div>
</div>

<div class="container text">
	<h2>Name of The Person: <?php echo $_GET['user']; ?></h2>
	<h2>Time Of Payment: <?php echo $_GET['time']; ?></h2>
	<h1><strong>Amount To be paid: <?php echo $_GET['cost']; ?></strong></h1>
	<br>
	<br>
	<form class="form-group col-sm-6 form-group">
		Name on Card:<input type="text" name="" placeholder="Name on Card" class="form-control">
		Card Number:<input type="text" name="" placeholder="XXXX-XXXX-XXXX-XXXX" class="form-control">
		Payment Option:<select class="form-control">
			<option>Select Card Type</option>
			<option>Visa</option>
			<option>Maestro</option>
			<option>Rupay</option>
		</select>
		Card Expiry:<input type="month" name="" class="form-control">
		CVV:<input type="password" name="" class="form-control col-sm-2">
		<button class="btn btn-primary">Pay</button>
	</form>
</div>
</body>
</html>

		
