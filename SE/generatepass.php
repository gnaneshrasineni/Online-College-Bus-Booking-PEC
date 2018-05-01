<?php 
   require 'include/header.php' ;
?>
 <script type="text/javascript">
     function printPass(divName)
      {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = "<html><head></head><body>"+"<h1>Bus Pass</h1>"+printContents+"</body></html>";

     window.print();

     document.body.innerHTML = originalContents;
    }

   </script>
    
    <div class="contentSection">
    <div class="contentToPrint">
        <h2 class="alert alert-success col-sm-6 " style="text-align: center;">Pass Generation</h2>
    </div>
    </div>
   <?php 
   $query=mysqli_query($con,"SELECT * FROM pass WHERE reg_no='$userLoggedIn' AND old_rec='no'");
   while($row=mysqli_fetch_array($query))
   {
   ?>
   <div>
    <div id="<?php echo "pass".$row['id']?>" class="alert alert-primary col-sm-6">
      <strong>Name</strong>: <?php echo $user['name']; ?> <br>
      <strong>Register Number</strong>: <?php echo $row['reg_no']; ?><br>
      <strong>validity</strong>: <?php echo $row['valid_thru']; ?><br>
      <strong>Time of Booking:</strong> <?php echo $row['date_time']; ?><br>
     <strong> Pass ID:</strong> <?php echo $row['id']; ?><br>
      <strong>Pass Type:</strong> <?php echo $row['pass_type']?><br>
      <strong>Bus No:</strong> <?php echo $row['bus_no']; ?><br>
      <strong>Amount :</strong><?php echo $row['cost']?><br>
    </div>
     <button  class="btn btn-danger" id="printOut" onclick="printPass('<?php echo "pass".$row['id']?>')">Print</button>
   </div>

   <?php 
 } 

   ?>
  

<?php require 'include/footer.php' ?>