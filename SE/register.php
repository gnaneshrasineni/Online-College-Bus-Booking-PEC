<?php
	require 'config/config.php';
	require 'include/form_handlers/password_gen.php';
	require 'include/form_handlers/login_handler.php';
	require 'include/form_handlers/register_handler.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div class="row container-fluid bg-light" id="header">
	<div class="col-sm-3 text-center"><img src="res/pec.png" style="width: 40%; margin-top: 3%;"></div>
	<div class="col-sm-6 text-center">
		<h1 style=" margin-top: 3%;"><strong>Pondicherry Engineering College</strong></h1>
		<h3>PEC Bus Pass System</h3>
	</div>
	<div class="col-sm-3 text-center"><img src="res/School_Bus.png" style="width: 80%; margin-top: 3%;"></div>
    </div>
		<!-- Login -->
		<div class="row">
		<div class="col-6 col-sm-6" align="center">	
		<form method="POST" action="register.php">
			<h5></br></br></br>LOGIN</h5>
			<div class="=form-group">
				<div class="col-sm-4"><input type="text" placeholder="Registration ID" class="form-control" name="log_id" value="<?php if(isset($_SESSION['log_id'])){echo $_SESSION['log_id'];} ?>" required></div>
				<div class="col-sm-4"><button class="btn btn-success" name="pass_gen_button" >Generate Password</button></div>
				<?php
				$array_length=count($gen_error);
				if($array_length!=0)
				{
					print_r($gen_error);
				} 
				 ?>
			</div>
		</form>
	<?php
		if($display_password_form)
		{
			//display the form
			?>
				 <form method="POST" action="register.php">
	 				<div class="=form-group">
						<div class="col-sm-4"></br><input type="password" class="form-control" name="log_password" required></div>
						<div class="col-sm-4"></br><button class="btn btn-success" name="login_button" >Login</button></div>
							<?php
								$array_length=count($gen_error);
								if($array_length!=0)
								{
									print_r($gen_error);
								} 
							 ?>
					</div>
	 	
	 			</form>
			<?php
		}
		for($i=0;$i<count($login_error);$i++)
		{
         echo $login_error[$i];
         }
			 ?>	 
			</div>
			 <!-- Registration -->
		 <div class="col-6 col-sm-6" align="center">	
        <form  action="register.php" method="POST">
        	   <p style="color: blue"></br>not yet Registered?</p>
        	   <h5>Register Here</h5>
         		<div class="form-group">
			<div class="col-sm-4"><input type="text" placeholder="Registration number" value="<?php if(isset($_SESSION['reg_number'])){echo $_SESSION['reg_number'];} ?>" class="form-control" name="reg_number" required></div>
		
			<div class="col-sm-4"><input type="text" placeholder="Firstname LastName" value="<?php if(isset($_SESSION['reg_name'])){echo $_SESSION['reg_name'];} ?>" class="form-control" name="reg_name" required></div>


			<div class="col-sm-4"><input type="email" placeholder="Email" value="<?php if(isset($_SESSION['reg_email'])){echo $_SESSION['reg_email'];} ?>" class="form-control" name="reg_email" required></div>

			<div class="col-sm-4"><input type="text" placeholder="department (eg: cse)" value="<?php if(isset($_SESSION['reg_dept'])){echo $_SESSION['reg_dept'];} ?>" class="form-control" name="reg_dept" required></div>
			<div class="col-sm-4"></br><button class="btn btn-success" name="register_button" >Register</button></div>
			<?php
				$array_length=count($error_array);
				if($array_length!=0)
				{
					for($x = 0; $x < $array_length; $x++) 
					{
    						echo $error_array[$x];
					}
				} 
			 ?>
        </div>
        </form>
      </div>
    </div>
      </body>
</html>