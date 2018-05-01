<?php require '../include/view_header.php' ?>

<div class="container">
	
<?php 
     $bus=mysqli_query($con,"SELECT * FROM pass WHERE pass_type='Yearly' AND old_rec='no' ");
	?>
		<h2>View by yearly pass</h2>
		<table class="table table-striped table-bordered">
			<thead class="thead-dark">
				<th>Bus number</th>
				<th>Reg_number</th>
				<th>Booked for</th>
			</thead>
			<tbody>
		<?php 
		while($row=mysqli_fetch_array($bus))
		{
			?>
			<tr>
				<td><?php echo $row['bus_no'];?></td>
				<td><?php echo $row['reg_no'];?></td>
				<td><?php echo $row['valid_thru'];?></td>
			</tr>
			<?php  
		}
		?>

</div>
</body>
</html>