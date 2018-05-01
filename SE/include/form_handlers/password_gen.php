<?php
	$gen_error=[];
	$display_password_form=false;
	
	if(isset($_POST['pass_gen_button']))
	{
		$id=htmlspecialchars($_POST["log_id"]);
		// echo $id;
		$check_database_query= mysqli_query($con,"SELECT email FROM students WHERE reg_no='$id'");
		$check_login_query=mysqli_num_rows($check_database_query);
		
		if($check_login_query==1) //if there exists a user with correct registration id
		{
			$display_password_form=true;
			$_SESSION['log_id']=$id;
			
			$row=mysqli_fetch_array($check_database_query);
			// Genterate one time password
			$digits = 5;
			$password=(string)rand(pow(10, $digits-1), pow(10, $digits)-1);
			$update_password_query=mysqli_query($con,"UPDATE students SET password='$password' WHERE reg_no='$id'");
			//Send Mail to the person
			$email=$row['email'];
			// echo $email;
			$subject="Password For Bus Pass";
			$msg="This is your 5 digit OTP:  " . $password;
			$headers="From: rockwillpro@gmail.com";
			// print_r($row);
			// mail($email,$subject,$msg,$headers);
		}
		else
		{
			array_push($gen_error,"Student Not Registered");

		}

	}
	


 ?>