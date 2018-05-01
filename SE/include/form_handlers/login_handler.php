<?php
	$login_error=[];
	
	if(isset($_POST['login_button']))
	{
		$id=$_SESSION['log_id'];
		$password=$_POST['log_password'];

		$check_database_query= mysqli_query($con,"SELECT * FROM students WHERE reg_no='$id' AND password='$password'");
		$check_login_query=mysqli_num_rows($check_database_query);
		
		if($check_login_query==1) //if there exists a user with correct registration id and password
		{
			//remove existing session variables written for prefill..
			session_unset();

			$row=mysqli_fetch_array($check_database_query);
			$_SESSION['username']=$row['reg_no'];
			if($_SESSION['username']=='admin')
			{
			header("Location: admin.php");
			exit();
		     }
		    else{
		    	header("Location: index.php");
		       exit();
		      } 
		}
		else
		{
			array_push($login_error,"Email or Password was incorrect<br>");
		}

	}


 ?>