<?php 
	require 'config/config.php';

	if(isset($_SESSION['username']))
	{
		$userLoggedIn=$_SESSION['username'];
		$user_details_query=mysqli_query($con,"SELECT * FROM students WHERE reg_no='$userLoggedIn'");
		$user=mysqli_fetch_array($user_details_query);
	}
	else
	{
		header("Location: register.php");
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>

<div class="row container-fluid bg-light" id="header">
	<div class="col-sm-3 text-center"><img src="res/pec.png" style="width: 40%; margin-top: 3%;"></div>
	<div class="col-sm-6 text-center">
		<h1 style=" margin-top: 3%;"><strong>Pondicherry Engineering College</strong></h1>
		<h3>Welcome To PEC Bus Pass System</h3>
	</div>
</div>
<!-- end of top header -->
<div class="row">	
	<div class="col-sm-3 text-center">
	<h2 style=" margin-top: 3%;"><span class="badge-primary"><?php echo $user['name']; ?></span></h2>	
		<div class="btn-group-vertical">
			<a class="btn btn-light" href="index.php">Bus Details</a>
  			<a class="btn btn-success" href="booking.php">Book a Pass</a>
			<a class="btn btn-info" href="renew.php">Renew Existing Pass</a>
			<a class="btn btn-warning" href="generatepass.php">Generate Pass</a>
			<a class="btn btn-danger" href="include/logout.php">Logout</a>
		</div>
		
	</div>
	<div class="col-sm-9">

		
