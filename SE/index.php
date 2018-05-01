<?php require 'include/header.php' ?>
<script type="text/javascript">
	function showBus(bus_no)
	{
		
		if(bus_no=="")
		{
			document.getElementById("busDetails").innerHTML="";
		}
		else
		{
			// document.getElementById("busDetails").innerHTML=bus_no;
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200)
				{
					document.getElementById("busDetails").innerHTML=this.responseText;
				}
			};
			xhttp.open("GET","include/bus_details_gen.php?bus_no="+bus_no,true);
			xhttp.send();
		}
	}
	
</script>

<h2 class="alert alert-success col-sm-6" style="text-align: center;">View Bus Details</h2>
<div class="col-sm-3">
<select name="bus" onchange="showBus(this.value)" class="form-control">
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
</select></div>
<div id="busDetails">
	
</div>


<?php require 'include/footer.php' ?>								