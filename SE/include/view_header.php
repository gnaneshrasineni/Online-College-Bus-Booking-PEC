<?php 
	require '../config/config.php';

if(($_SESSION['username']=='admin'))
	{
		$userLoggedIn=$_SESSION['username'];
	echo $userLoggedIn;
	}
	else
	{
		header("Location: ../register.php");
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

</head>
<body>

<div class="row container-fluid bg-light" id="header">
	<div class="col-sm-3 text-center"><img src="../res/pec.png" style="width: 40%; margin-top: 3%;"></div>
	<div class="col-sm-6 text-center">
		<h1 style=" margin-top: 6%;"><strong>Pondicherry Engineering College</strong></h1>
		<h3>Welcome To PEC Bus Pass System</h3>
	</div>
</div>
<!-- end of top header -->
