<?php require '../include/view_header.php' ?>

<div class="container">
	<h2>View by bus</h2>
	<?php 
	for ($i=1; $i <= 9; $i++) { 
     $bus=mysqli_query($con,"SELECT * FROM pass WHERE bus_no='$i' AND old_rec='no'");
	?> <p>Bus number : <?php echo $i;?></p>
		<table class="table table-striped table-bordered">
			<thead class="thead-dark">
				<th>Reg_number</th>
				<th>Booked for</th>
				<th>Pass Type</th>
			</thead>
			<tbody>
		<?php 
		while($row=mysqli_fetch_array($bus))
		{
			?>
			<tr>
				<td><?php echo $row['reg_no'];?></td>
				<td><?php echo $row['valid_thru'];?></td>
				<td><?php echo $row['pass_type'];?></td>
			</tr>
			<?php  
		}
		?>
		</tbody>
	   </table>	
	   <?php } ?>
</div>
</body>
</html>