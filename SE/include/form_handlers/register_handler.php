<?php
		// varaibles to prevent errors
	$reg_number='';
	$reg_name='';
	$email='';
	$reg_dept='';
	$error_array=[];

	if(isset($_POST['register_button']))
	{
		// registration form values

		// reg number
		$reg_number= strip_tags($_POST['reg_number']); //remove html tags
		$reg_number=str_replace(' ','',$reg_number);//remove spaces
		$reg_number=ucfirst(strtolower($reg_number));
		$_SESSION['reg_number']=$reg_number;

		//name
		$reg_name= strip_tags($_POST['reg_name']); //remove html tags
		$reg_name=str_replace(' ','',$reg_name);//remove spaces
		$reg_name=ucfirst(strtolower($reg_name));
		$_SESSION['reg_name']=$reg_name;

		//email
		$reg_email= strip_tags($_POST['reg_email']); //remove html tags
		$reg_email=str_replace(' ','',$reg_email);//remove spaces
		$reg_email=strtolower($reg_email);
		$_SESSION['$reg_email']=$reg_email;
		// dept
		$reg_dept=strip_tags($_POST['reg_dept']);
		$reg_dept=str_replace(' ','',$reg_dept);
        $reg_dept=ucfirst(strtolower($reg_dept));
		// login if there are no errors
		$check=mysqli_query($con,"SELECT reg_no FROM students WHERE reg_no='$reg_number'");
		$num_rows=mysqli_num_rows($check);
        if($num_rows==0)
		{
		$insert_query=mysqli_query($con,"INSERT INTO students values('','$reg_number','$reg_name','$reg_email','','$reg_dept')");
	     array_push($error_array,"<span style='color:#14c800'>Great! you are all set!! continue to login!</span>");
		}
		else
		  {		
		    array_push($error_array,"Register number already in use");
	       }
		// remove all session variables
		 session_unset();

			// destroy the session
		 session_destroy(); 

	}

?>