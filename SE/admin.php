<?php 
	require 'config/config.php';

	if(isset($_SESSION['username'])  and $_SESSION['username']=='admin')
	{
		$userLoggedIn=$_SESSION['username'];
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
	<script>
		function loadPage(page)
		{
			document.getElementById('link').href=page;
		}
		
	</script>

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
	<h2 style=" margin-top: 3%;"><span class="badge-primary badge-pill"><?php echo $userLoggedIn; ?></span></h2>	
		

       <?php 
         if(isset($_POST['end_reg']))
         {
         	$query=mysqli_query($con,"UPDATE pass SET old_rec='yes' WHERE 1");
         	$reset="55,55,55,55,55";
         	echo $reset;
         	$seat_reset=mysqli_query($con,"UPDATE bus SET sem1='$reset',sem2='$reset' WHERE 1");
         	echo "registrations are sent to old records";
         }
       ?>

		<form  class="form-group" method="POST" action="admin.php">
			<div class="alert alert-danger">
				<h4 class="alert-heading">Caution!</h4>
				<hr>
				Press This Button only at the end of achademic year
				This will expire all the passes of the current year so that the 
				students can enroll for the next year.
			</div>
			<button class="btn btn-danger" name="end_reg">End Registrations</button>
		</form>
		<a class="btn btn-danger" href="include/logout.php">Logout</a>
	</div>
	<!-- end of side bar -->

	



	<div class="col-sm-9">
			<div class="form-group text-center col-sm-6" style="margin-top: 4%;">
				<div class="alert alert-primary" role="alert">
				  Whant to view the existing bookings??
				</div>
				<select name="view" class="form-control text-center" onchange="loadPage(this.value)">
					<option value="#">Select an Option</option>
					<option value="view/bus.php">By Bus</option>
					<option value="view/monthly.php">Monthly Category</option>
					<option value="view/odd.php">Odd Sem</option>
					<option value="view/even.php">Even Sem</option>
					<option value="view/year.php">Yearly</option>
				</select>
				<a href="#" id="link" class="btn btn-primary" style="margin-top: 4%;" target="_blank">Press Here</a>
			</div>
			
	
		

</div> <!-- col-9-ending -->
</div>	<!-- end of row -->
</body>
</html>