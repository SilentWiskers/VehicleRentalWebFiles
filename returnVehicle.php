<?php
session_start();

$conn = mysqli_connect("mysql1.cs.clemson.edu","Base1_rjag","cbustam/Base1","Base1");


if(isset($_POST["return"])){
	$v = $_GET["vin"];
	$deleteContract = "DELETE FROM Contract WHERE VIN = '$v'";
	mysqli_query($conn, $deleteContract);
	
	$updateVehicle = "update Vehicle set Availability = 0 where VIN = '$v'";
	mysqli_query($conn, $updateVehicle);
	$v="";

}


?>

<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="companylist.css">
</head>
<body>

<table id="example" class="table table-striped table-bordered" style="width:96%">
        <thead>
            <tr>
                <th>Year</th>
                <th>Make</th>
				<th>Model</th>
				<th>Type</th>
				<th>Check out Date</th>
				<th>Due Date</th>
				<th>Total Price</th>
                
            </tr>
        </thead>
		<tbody>
			
			<?php 
			$u = $_SESSION['username'];
			$query = "SELECT DL FROM Customer WHERE Uname = '$u'";
			$result = mysqli_query($conn, $query);
			
			$fetch = mysqli_fetch_assoc($result);
			
			$dl = $fetch["DL"];
			$query2 = "SELECT VIN FROM Contract WHERE DL = '$dl'";
			$result2 = mysqli_query($conn, $query2);
			
			if(mysqli_num_rows($result2) > 0)
			{
				while($row = mysqli_fetch_array($result2))
				{
					$v = $row["VIN"];
					$query3 = "SELECT * FROM Vehicle WHERE VIN = '$v'";
					$res = mysqli_query($conn, $query3);
					$sel = mysqli_fetch_assoc($res);
					
					$query4 = "SELECT * FROM Contract WHERE VIN = '$v'";
					$r = mysqli_query($conn, $query4);
					$s = mysqli_fetch_assoc($r);
					
					
			?>	
				<form action ="returnVehicle.php?vin=<?php echo $sel["VIN"]; ?>" method="post" class="form-signin">	
					<tr>
                		<td><?php echo $sel["Year"]; ?></td>
                		<td><?php echo $sel["Make"]; ?></td>
						<td><?php echo $sel["Model"]; ?></td>
						<td><?php echo $sel["Type"]; ?></td>
						<td><?php echo $s["Check_out_Date"]; ?></td>
						<td><?php echo $s["Due_Date"]; ?></td>
						<td><?php echo $s["Total_Price"]; ?></td>
						<td><button name="return" class="btn btn-lg btn-primary btn-block" style="margin-left:54px;" type="submit">Return Vehicle</button></td>
                		
            		</tr>
				</form>	
			<?php	
				}
			} else{ ?>
				<h3> You currently have no rentals</h3>
			<?php }
			?>
			
		</tbody>
    </table>
		
</body>
</html>	