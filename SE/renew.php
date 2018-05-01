<?php require 'include/header.php' ?>

<?php 
	$months=["","January","February","March","April","May","June","July","August","Spetember","October","November","December"];
	$month_sem1=["July","August","Spetember","October","November"];
	$month_sem2=["January","February","March","April","May"];
	$holidays=["December","June"];
 ?>

<?php 
	$most_recent_booking=mysqli_query($con,"SELECT * FROM pass WHERE reg_no='$userLoggedIn'AND old_rec='no' ORDER BY date_time DESC ");
	if(mysqli_num_rows($most_recent_booking)==0)
	{
		echo "<div class='alert alert-warning' col-sm-6>No Bookings yet</div>";
	}
	$arr = mysqli_fetch_array($most_recent_booking);

	// print_r($arr);
	$booking_type=$arr['pass_type'];
	$hide_form=true;
	$bus_no=$arr['bus_no'];
	// echo $booking_type;
 ?>


<?php $logical_error=[];
	  $message='No Bookings Yet';
	  $pass_type=-1;
 ?>


 <?php 
 	if($booking_type=='Monthly')
 	{
 		//determine the next month
 		$cur_month=$arr['valid_thru'];
 		$num = array_search($cur_month,$months);
 		//if the number is 11 push into error array that it is the last month ----add code here---
 		if($num==11)
 		{
 			array_push($logical_error, "Wait until next achedamic year!!!");
 			$hide_form=true;
 		}

 		while ($num+1!=12) 
 		{
 			if((in_array($months[$num+1],$month_sem1)) or (in_array($months[$num+1],$month_sem2)) )
 			{
 				$num=$num+1;
 				break;
 			}	
 			else
 			{
 				$num=$num+1;
 			}
 		}
 		$next_month=$months[$num];
 		$message="Do You want to renew for the next month : ".$next_month;
 		
 		$hide_form=false;
 		$pass_type=0;
 	}
  ?>

  <?php 
  	if($booking_type=='Odd Sem')
  	{
  		$message="Do You want to register for the Even Semester";
  		$hide_form=false;
  		$pass_type=2;//register even sem
  	}
  	if($booking_type=='Even Sem')
  	{
  		array_push($logical_error, "Wait until next achedamic year!!!");
  		echo "<div class='alert alert-info col-sm-6'>Wait until next achedamic year!!!</div>";
  		$hide_form=true;
  	}
  	if($booking_type=='Yearly')
  	{
  		array_push($logical_error, "Wait until next achedamic year!!!");
  		echo "<div class='alert alert-info col-sm-6'>Wait until next achedamic year!!!</div>";
  		$hide_form=true;
  	}
   ?>


   <?php 
   		if(!$hide_form)
   		{
   			?>
   			<form method="POST" action="renew.php">
   				<div class="alert alert-warning col-sm-6"><?php echo $message;?></div>
   				<button class="btn btn-primary" name="renew_pass">Renew Pass!!</button>
   			</form>
   			<?php 

   		}
    ?>

    <?php 
	if(isset($_POST['renew_pass']))
	{
		$error=$logical_error;
		$warning=[];
		echo $bus_no."bus no<br>";
		if($pass_type==0)//monthly
		{
			
			$selected_month=$next_month;
		
			if(in_array($selected_month, $holidays)) 
			{
				// echo "Not a Working month";
				array_push($error,"Not a Working month");
			}
			echo "Test 1 passed<br>";
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
				// echo "sucess";
			}
			else
			{
				print_r($error);
			}


		}//end of monthly booking

		if($pass_type==2)
		{
			$check_existing_records_query=mysqli_query($con,"SELECT * FROM pass WHERE reg_no='$userLoggedIn' AND old_rec='no'");
			if(mysqli_num_rows($check_existing_records_query)!=0)
			{
				while ($row=mysqli_fetch_array($check_existing_records_query)) 
				{
					$booked_months=explode(",",$row['valid_thru']);
					$intersect=array_intersect($month_sem2, $booked_months);
					print_r($intersect);
					if(!empty($intersect))//warning check
					{
						// array_push($warning,"you already have passes for some of the months in the current semester, no price will be deducted");
						array_push($error,"Sorry Looks like you are in Another scheme!! You cannot avail this facility sem 222 codee");
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
						echo "SEM 2 available";

					}

				}
			if(empty($error))
			{
				
				$selected_month=implode(",",$month_sem2);
				$booking_time=date("Y-m-d H:i:s");
				$booking_query=mysqli_query($con,"INSERT INTO pass VALUES('','$userLoggedIn','$selected_month','no','$booking_time','Even Sem','4500','$bus_no')");//add pass type
			}
			else
			{
				print_r($error);
			}
			// print_r($warning);

		}


	}
 ?>








<?php require 'include/footer.php' ?>