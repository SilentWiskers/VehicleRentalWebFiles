<?php
session_start();

$conn = mysqli_connect("mysql1.cs.clemson.edu","Base1_rjag","cbustam/Base1","Base1");

if(isset($_POST["rent"])){
	$_SESSION['v'] = $_GET["vin"];
	header('location:rentalPeriod.php');
}

if(isset($_POST["return"])){
	header('location:returnVehicle.php');
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
				<th>Price Per Day</th>
				<th>Availability</th>
                
            </tr>
        </thead>
		<tbody>
			
			<?php 
			$query = "SELECT * FROM Vehicle";
			$result = mysqli_query($conn, $query);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
			?>	
				<form action ="vehicleList.php?vin=<?php echo $row["VIN"]; ?>" method="post" class="form-signin">	
					<tr>
                		<td><?php echo $row["Year"]; ?></td>
                		<td><?php echo $row["Make"]; ?></td>
						<td><?php echo $row["Model"]; ?></td>
						<td><?php echo $row["Type"]; ?></td>
						<td><?php echo $row["Price"]; ?></td>
						<?php if ($row["Availability"] == 0){?>
							<td><button name="rent" class="btn btn-lg btn-primary btn-block" type="submit">Rent Vehicle</button></td>
						<?php }else{ ?>
							<td><button name="rent" class="btn btn-lg btn-primary btn-block" type="submit" disabled>Rent Vehicle</button></td>
						<?php } ?>
                		
            		</tr>
				</form>	
			<?php	
				}
			}
			?>
			
		</tbody>
    </table>
		<form action ="" method="post" class="form-signin">
			<button name="return" class="btn btn-lg btn-primary btn-block" style="margin-left:54px;" type="submit">Return a Vehicle</button></td>
		</form>
</body>
</html>	