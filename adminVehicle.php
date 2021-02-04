<?php
session_start();

$conn = mysqli_connect("mysql1.cs.clemson.edu","Base1_rjag","cbustam/Base1","Base1");
$message = "";

if(isset($_POST["remove"])){
	$v = $_GET["vin"];
	$deleteVehicle = "DELETE FROM Vehicle WHERE VIN = '$v'";
	mysqli_query($conn, $deleteVehicle);
	$v="";
}

if(isset($_POST["edit"])){
	$_SESSION['v'] = $_GET["vin"];
	header('location:editVehicle.php');
}

if(isset($_POST["add"])){
	header('location:incrVehicle.php');
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
                <th>VIN</th>
                <th>Year</th>
                <th>Make</th>
				<th>Model</th>
				<th>Type</th>
				<th>Price</th>
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
				<form action ="adminVehicle.php?vin=<?php echo $row["VIN"]; ?>" method="post" class="form-signin">	
					<tr>
						<td><?php echo $row["VIN"]; ?></td>
                		
                		<td><?php echo $row["Year"]; ?></td>
                		<td><?php echo $row["Make"]; ?></td>
						<td><?php echo $row["Model"]; ?></td>
						<td><?php echo $row["Type"]; ?></td>
						<td><?php echo $row["Price"]; ?></td>
						<?php if ($row["Availability"] == 0){
							$message = "Available";
						}else{
							$message = "Unavailable";
						}?>
						<td><?php echo $message; ?></td>
                		<td><button name="edit" class="btn btn-lg btn-primary btn-block" type="submit">Edit Vehicle</button></td>
						<td><button name="remove" class="btn btn-lg btn-primary btn-block" type="submit">Remove Vehcile</button></td>
            		</tr>
				</form>	
			<?php	
				}
			}
			?>
			
		</tbody>
    </table>
		<form action ="" method="post" class="form-signin">
			<button name="add" class="btn btn-lg btn-primary btn-block" style="margin-left:54px;" type="submit">Add Vehicle</button></td>
		</form>
</body>
</html>	