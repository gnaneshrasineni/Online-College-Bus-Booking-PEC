<?php require 'include/header.php' ?>

<?php 
	$months=["","January","February","March","April","May","June","July","August","Spetember","October","November","December"];
	$month_sem1=["July","August","Spetember","October","November"];
	$month_sem2=["January","February","March","April","May"];
	$holidays=["December","June"];
 ?>
<?php 
	if(isset($_POST['book_pass']))
	{
		$error=[];
		$warning=[];
		$pass_type = $_POST['pass_type'];
		$bus_no=$_POST['bus_no'];
		// echo $bus_no."bus no<br>";
		if($pass_type==0)//monthly
		{
			$arr=explode("-",$_POST['month']);
			$month_num=end($arr);
			// $selected_month =$months[$month_num];
			$selected_month=date('F', mktime(0, 0, 0, $month_num, 10));
			// echo $selected_month."<br>";

			// test 1
			if(in_array($selected_month, $holidays)) 
			{
				// echo "Not a Working month";
				array_push($error,"Not a Working month");
			}
			// echo "Test 1 passed<br>";
			// test 2
			$check_existing_records_query=mysqli_query($con,"SELECT * FROM pass WHERE reg_no='$userLoggedIn' AND old_rec='no'");
			if(mysqli_num_rows($check_existing_records_query)!=0)
			{
				while ($row=mysqli_fetch_array($check_existing_records_query)) 
				{
					$booked_months=explode(",",$row['valid_thru']);
					if(in_array($selected_month,$booked_months))
					{
						array_push($error,"You already have a booking! Booking ID: ".$row['id']);
						// echo "You already have a booking! Booking ID<br>:" ;
					}
				}
			}

			$select_bus_query=mysqli_query($con,"SELECT * FROM bus WHERE bus_id='$bus_no'");
				$bus=mysqli_fetch_array($select_bus_query);
				
				if(in_array($selected_month, $month_sem1) and empty($error))
				{
					$count=explode(",",$bus['sem1']);
					$index=array_search($selected_month,$month_sem1);
					if($count[$index]==0)
					{
						array_push($error,"Not Enough Seats in bus 1");
					}
					else
					{
						$count[$index]=$count[$index]-1;
						$new_count=implode(",", $count);
						$update_count_query=mysqli_query($con,"UPDATE bus SET sem1='$new_count' WHERE bus_id='$bus_no'");
						echo "SEM 1 available";
					}
				}
				elseif(in_array($selected_month, $month_sem2) and empty($error))
				{
					$count=explode(",",$bus['sem2']);
					$index=array_search($selected_month,$month_sem2);
					if($count[$index]==0)
					{
						array_push($error,"Not Enough Seats in bus 2");
					}
					else
					{
						$count[$index]=$count[$index]-1;
						$new_count=implode(",", $count);
						$update_count_query=mysqli_query($con,"UPDATE bus SET sem2='$new_count' WHERE bus_id='$bus_no'");
						echo "SEM 2 available";
					}

				}


			if(empty($error))
			{
				

				// echo "no errors<br>";
				$booking_time=date("Y-m-d H:i:s");
				$booking_query=mysqli_query($con,"INSERT INTO pass VALUES('','$userLoggedIn','$selected_month','no','$booking_time','Monthly','1000','$bus_no')");//add pass type
					?>
				<script>
					var url="payment.php?user=<?php echo $user['name'];?>&cost=1000&time=<?php echo $booking_time;?>";
					window.open(url,"_blank");
				</script>
				<?php 
				// echo "sucess";
			}
			else
			{
				echo "<div class='alert alert-danger'>";
				foreach ($error as $key => $value)
				{
					 echo $value . "<hr>";
				}
				echo "</div>";
			}


		}//end of monthly booking


		if($pass_type==1)
		{
			$check_existing_records_query=mysqli_query($con,"SELECT * FROM pass WHERE reg_no='$userLoggedIn' AND old_rec='no'");
			if(mysqli_num_rows($check_existing_records_query)!=0)
			{
				while ($row=mysqli_fetch_array($check_existing_records_query)) 
				{
					$booked_months=explode(",",$row['valid_thru']);
					$intersect=array_intersect($month_sem1, $booked_months);
					if(!empty($intersect))//warning check
					{
						// array_push($warning,"you already have passes for some of the months in the current semester, no price will be deducted");
						array_push($error,"Sorry Looks like you are in Another scheme!! You cannot avail this facility");
					}
					if($row['pass_type']=='Odd Sem')
					{
						array_push($error,"You already have a booking! Booking ID: ".$row['id']);
					}

				}
			}


			$select_bus_query=mysqli_query($con,"SELECT * FROM bus WHERE bus_id='$bus_no'");
				$bus=mysqli_fetch_array($select_bus_query);
				
				if(empty($error))
				{	
					$pass=true;
					$count=explode(",",$bus['sem1']);
					for($x=0;$x<5;$x++)
					{
						if($count[$x]==0)
						{
							$pass=false;
							array_push($error,"seats not available");
						}
					}

					if($pass)
					{
						for($x=0;$x<5;$x++)
						{
							$count[$x]=$count[$x]-1;
						}
						$new_count=implode(",", $count);
						$update_count_query=mysqli_query($con,"UPDATE bus SET sem1='$new_count' WHERE bus_id='$bus_no'");
						// echo "SEM 1 available";

					}

				}
			if(empty($error))
			{
				
				$selected_month=implode(",",$month_sem1);
				$booking_time=date("Y-m-d H:i:s");
				$booking_query=mysqli_query($con,"INSERT INTO pass VALUES('','$userLoggedIn','$selected_month','no','$booking_time','Odd Sem','4500','$bus_no')");//add pass type
				?>
				<script>
					var url="payment.php?user=<?php echo $user['name'];?>&cost=4500&time=<?php echo $booking_time;?>";
					window.open(url,"_blank");
				</script>
				<?php 
			}
			else
			{
				echo "<div class='alert alert-danger'>";
				foreach ($error as $key => $value)
				{
					 echo $value . "<hr>";
				}
				echo "</div>";
			}
			// print_r($warning);

		}




		if($pass_type==2)
		{
			$check_existing_records_query=mysqli_query($con,"SELECT * FROM pass WHERE reg_no='$userLoggedIn' AND old_rec='no'");
			if(mysqli_num_rows($check_existing_records_query)!=0)
			{
				while ($row=mysqli_fetch_array($check_existing_records_query)) 
				{
					$booked_months=explode(",",$row['valid_thru']);
					$intersect=array_intersect($month_sem2, $booked_months);
					// print_r($intersect);
					if(!empty($intersect))//warning check
					{
						// array_push($warning,"you already have passes for some of the months in the current semester, no price will be deducted");
						array_push($error,"Sorry Looks like you are in Another scheme!! You cannot avail this facility ");
					}
					if($row['pass_type']=='Even Sem')
					{
						array_push($error,"You already have a booking! Booking ID: ".$row['id']);
					}

				}
			}


			$select_bus_query=mysqli_query($con,"SELECT * FROM bus WHERE bus_id='$bus_no'");
				$bus=mysqli_fetch_array($select_bus_query);
				
				if(empty($error))
				{	
					$pass=true;
					$count=explode(",",$bus['sem2']);
					for($x=0;$x<5;$x++)
					{
						if($count[$x]==0)
						{
							$pass=false;
							array_push($error,"seats not available");
						}
					}

					if($pass)
					{
						for($x=0;$x<5;$x++)
						{
							$count[$x]=$count[$x]-1;
						}
						$new_count=implode(",", $count);
						$update_count_query=mysqli_query($con,"UPDATE bus SET sem2='$new_count' WHERE bus_id='$bus_no'");
						// echo "SEM 2 available";

					}

				}
			if(empty($error))
			{
				
				$selected_month=implode(",",$month_sem2);
				$booking_time=date("Y-m-d H:i:s");
				$booking_query=mysqli_query($con,"INSERT INTO pass VALUES('','$userLoggedIn','$selected_month','no','$booking_time','Even Sem','4500','$bus_no')");//add pass type
				?>
				<script>
					var url="payment.php?user=<?php echo $user['name'];?>&cost=4500&time=<?php echo $booking_time;?>";
					window.open(url,"_blank");
				</script>
				<?php 
			}
			else
			{
				echo "<div class='alert alert-danger'>";
				foreach ($error as $key => $value)
				{
					 echo $value . "<hr>";
				}
				echo "</div>";
			}
			// print_r($warning);

		}

		if($pass_type==3)
		{
			$check_existing_records_query=mysqli_query($con,"SELECT * FROM pass WHERE reg_no='$userLoggedIn' AND old_rec='no'");
			if(mysqli_num_rows($check_existing_records_query)!=0)
			{
				while ($row=mysqli_fetch_array($check_existing_records_query)) 
				{
					$booked_months=explode(",",$row['valid_thru']);
					$intersect=array_intersect($month_sem2, $booked_months);
					// print_r($intersect);
					if(!empty($intersect))//warning check
					{
						// array_push($warning,"you already have passes for some of the months in the current semester, no price will be deducted");
						array_push($error,"Sorry Looks like you are in Another scheme!! You cannot avail this facility");
					}
					if($row['pass_type']=='Even Sem')
					{
						array_push($error,"You already have a booking! Booking ID: ".$row['id']);
					}

				}
			}


			$select_bus_query=mysqli_query($con,"SELECT * FROM bus WHERE bus_id='$bus_no'");
				$bus=mysqli_fetch_array($select_bus_query);
				
				if(empty($error))
				{	
					$pass=true;
					$count=explode(",",$bus['sem1']);
					for($x=0;$x<5;$x++)
					{
						if($count[$x]==0)
						{
							$pass=false;
							array_push($error,"seats not available");
						}
					}

					$count=explode(",",$bus['sem2']);
					for($x=0;$x<5;$x++)
					{
						if($count[$x]==0)
						{
							$pass=false;
							array_push($error,"seats not available");
						}
					}

					if($pass)
					{
						for($x=0;$x<5;$x++)
						{
							$count[$x]=$count[$x]-1;
						}
						$new_count=implode(",", $count);
						$update_count_query=mysqli_query($con,"UPDATE bus SET sem2='$new_count' WHERE bus_id='$bus_no'");
						// echo "SEM 2 available";
						// decrement sem 1
						$count=explode(",",$bus['sem1']);
						for($x=0;$x<5;$x++)
						{
							$count[$x]=$count[$x]-1;
						}
						$new_count=implode(",", $count);
						$update_count_query=mysqli_query($con,"UPDATE bus SET sem1='$new_count' WHERE bus_id='$bus_no'");

					}

				}
			if(empty($error))
			{
				
				$selected_month2=implode(",",$month_sem2);
				$selected_month1=implode(",",$month_sem1);
				$selected_month=$selected_month1.",".$selected_month2;
				$booking_time=date("Y-m-d H:i:s");
				$booking_query=mysqli_query($con,"INSERT INTO pass VALUES('','$userLoggedIn','$selected_month','no','$booking_time','Yearly','8000','$bus_no')");//add pass type
				?>
				<script>
					var url="payment.php?user=<?php echo $user['name'];?>&cost=8000&time=<?php echo $booking_time;?>";
					window.open(url,"_blank");
				</script>
				<?php 
			}
			else
			{
				echo "<div class='alert alert-danger'>";
				foreach ($error as $key => $value)
				{
					 echo $value . "<hr>";
				}
				echo "</div>";
			}

		}



	}
 ?>

<h3 class="alert-info  badge-pill  text-center col-sm-6">Make your booking here</h3>
<form method="POST" action="booking.php" class="form-group col-sm-6">
	<label for="bus_no" >Select Bus</label>
	<select name="bus_no" required class="form-control">
		<option value="">Select a Bus</option>
		<option value="1">Bus No.1</option>
		<option value="2">Bus No.2</option>
		<option value="3">Bus No.3</option>
		<option value="4">Bus No.4</option>
		<option value="5">Bus No.5</option>
		<option value="6">Bus No.6</option>
		<option value="7">Bus No.7</option>
		<option value="8">Bus No.8</option>
		<option value="9">Bus No.9</option>
	</select>
	<label for="pass_type" >Select the Type of Pass</label>
	<select class="form-control" name="pass_type" required>
		<option value="">Select a Plan</option>
		<option value="0">Monthly</option>
		<option value="1">Odd Semester</option>
		<option value="2">Even Semester</option>
		<option value="3">Full Achedemic Year</option>
	</select>
	<div class="alert alert-warning text-center">
		<h5 class="alert-heading">Please note</h5>
		<hr>
		Change Month only if you have chosen 'Monthly' above. <br>
		This booking is applicable only for this Achedmic year
		<hr>
		Don't worry if you have selected wrong 'Year'
	</div>
	
	<input type="month" name="month" class="form-control" value="<?php echo date('Y-m'); ?>">
	<div><button name="book_pass" class="btn btn-dark">Confirm Your Booking</button></div>
</form>
<?php require 'include/footer.php' ?>