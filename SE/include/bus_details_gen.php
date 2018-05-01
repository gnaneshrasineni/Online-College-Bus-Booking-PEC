<?php require '../config/config.php' ?>
<?php 
	// echo "request reached";
	if(isset($_REQUEST['bus_no']))
	{
		$bus_no = $_REQUEST['bus_no']; //1
		$bus_details_query=mysqli_query($con,"SELECT * FROM bus WHERE bus_id='$bus_no'");
		$details=mysqli_fetch_array($bus_details_query);
		$to_pec=explode(",",$details['to_pec']);
		// print_r($to_pec);
		?>
		<div class="row">
		<div class="col-sm-4 text-center" style="margin-top: 2%;">
			<h2>Way Towards Pec</h2>
		<table class="table table-striped table-bordered">
			<thead class="thead-dark">
				<th>Place</th>
				<th>Time</th>
			</thead>
			<tbody>
		<?php 
		for($x=0;$x<count($to_pec);$x++)
		{
			$row= explode("-", $to_pec[$x]);
			?>
			<tr>
				<td><?php echo $row[0];?></td>
				<td><?php echo $row[1];?></td>
			</tr>
			<?php  
		}
		?>
		</tbody>
		</table>
		</div>
		<?php
		$from_pec=explode(",",$details['from_pec']);
		// print_r($to_pec);
		?>
		<div class="col-sm-4 text-center" style="margin-top: 2%;">
			<h2>Pec To Your Place</h2>
		<table class="table table-striped table-bordered">
			<thead class="thead-dark">
				<th>Place</th>
				<th>Time</th>
			</thead>
			<tbody>
		<?php 
		for($x=0;$x<count($from_pec);$x++)
		{
			$row= explode("-", $from_pec[$x]);
			?>
			<tr>
				<td><?php echo $row[0];?></td>
				<td><?php echo $row[1];?></td>
			</tr>
			<?php  
		}
		?>
		</tbody>
		</table>
		</div></div>
		
		<?php

		$month_sem1=["July","August","Spetember","October","November"];
		$month_sem2=["January","February","March","April","May"];
		$sem1_count=explode(",", $details['sem1']);
		$sem2_count=explode(",", $details['sem2']);

		?>
		<div class="row">
		<div class="col-sm-4 text-center" style="margin-top: 2%;">
			<h3>Seat Availability For Odd Sem</h3>
		<table class="table table-striped table-bordered">
			<thead class="thead-dark">
				<th>Month</th>
				<th>No of Seats</th>
			</thead>
			<tbody>
		<?php 
		for($x=0;$x<5;$x++)
		{
			?>
			<tr>
				<td><?php echo $month_sem1[$x];?></td>
				<td><?php echo $sem1_count[$x];?></td>
			</tr>
			<?php  
		}
		?>
		</tbody>
		</table>
		</div>
		<?php
		?>
		<div class="col-sm-4 text-center" style="margin-top: 2%;">
			<h3>Seat Availability For Even Sem</h3>
		<table class="table table-striped table-bordered">
			<thead class="thead-dark">
				<th>Month</th>
				<th>No of Seats</th>
			</thead>
			<tbody>
		<?php 
		for($x=0;$x<5;$x++)
		{
			?>
			<tr>
				<td><?php echo $month_sem2[$x];?></td>
				<td><?php echo $sem2_count[$x];?></td>
			</tr>
			<?php  
		}
		?>
		</tbody>
		</table>
		</div></div>
		<?php




	}
 ?>