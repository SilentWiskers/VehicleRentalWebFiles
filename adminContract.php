<?php
session_start();

$conn = mysqli_connect("mysql1.cs.clemson.edu","Base1_rjag","cbustam/Base1","Base1");

if(isset($_POST["remove"])){
	$c = $_GET["ID"];
	$deleteContract = "DELETE FROM Contract WHERE ContractID = '$c'";
	mysqli_query($conn, $deleteContract);
	$c="";
}

if(isset($_POST["edit"])){
	$_SESSION['c'] = $_GET["ID"];
	header('location:editContract.php');
}

if(isset($_POST["add"])){
	header('location:incrContract.php');
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
                <th>ContractID</th>
                <th>Check out Date</th>
                <th>Due Date</th>
				<th>Total Price</th>
				<th>Driver Lisence</th>
				<th>VIN</th>
                
            </tr>
        </thead>
		<tbody>
			
			<?php 
			$query = "SELECT * FROM Contract";
			$result = mysqli_query($conn, $query);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
			?>	
				<form action ="adminContract.php?ID=<?php echo $row["ContractID"]; ?>" method="post" class="form-signin">	
					<tr>
						<td><?php echo $row["ContractID"]; ?></td>
                		
                		<td><?php echo $row["Check_out_Date"]; ?></td>
                		<td><?php echo $row["Due_Date"]; ?></td>
						<td><?php echo $row["Total_Price"]; ?></td>
						<td><?php echo $row["DL"]; ?></td>
						<td><?php echo $row["VIN"]; ?></td>
						
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