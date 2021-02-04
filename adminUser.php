<?php
session_start();

$conn = mysqli_connect("mysql1.cs.clemson.edu","Base1_rjag","cbustam/Base1","Base1");
$message = "";

if(isset($_POST["remove"])){
	$u = $_GET["uname"];
	$deleteUser = "DELETE FROM Customer WHERE Uname = '$u'";
	$deleteLogin = "DELETE FROM Login WHERE Uname = '$u'";
	mysqli_query($conn, $deleteUser);
	mysqli_query($conn, $deleteLogin);
	$u="";
}

if(isset($_POST["edit"])){
	$_SESSION['u'] = $_GET["uname"];
	$_SESSION['d'] = $_GET["dl"];
	header('location:edituser.php');
}

if(isset($_POST["add"])){
	header('location:incrUser.php');
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
                <th>First</th>
                <th>Last</th>
                <th>Address</th>
				<th>Card Number</th>
				<th>Card Type</th>
				<th>Drivers Lisence</th>
				<th>User Name</th>
                
            </tr>
        </thead>
		<tbody>
			
			<?php 
			$query = "SELECT * FROM Customer";
			$result = mysqli_query($conn, $query);
			
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
			?>	
				<form action ="adminUser.php?uname=<?php echo $row["Uname"]; ?>&dl=<?php echo $row["DL"]; ?>" method="post" class="form-signin">	
					<tr>
						<td><?php echo $row["First"]; ?></td>
                		
                		<td><?php echo $row["Last"]; ?></td>
                		<td><?php echo $row["Address"]; ?></td>
						<td><?php echo $row["Card_Num"]; ?></td>
						<td><?php echo $row["Card_Type"]; ?></td>
						<td><?php echo $row["DL"]; ?></td>
						
						<td><?php echo $row["Uname"]; ?></td>
                		<td><button name="edit" class="btn btn-lg btn-primary btn-block" type="submit">Edit User</button></td>
						<td><button name="remove" class="btn btn-lg btn-primary btn-block" type="submit">Remove User</button></td>
            		</tr>
				</form>	
			<?php	
				}
			}
			?>
			
		</tbody>
    </table>
	
	<table id="example" class="table table-striped table-bordered" style="width:96%">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Password</th>
                
                
            </tr>
        </thead>
		<tbody>
			
			<?php 
			$query = "SELECT * FROM Login WHERE Type = 0";
			$res = mysqli_query($conn, $query);
			if(mysqli_num_rows($res) > 0)
			{
				while($row = mysqli_fetch_array($res))
				{
			?>	
				<form action ="" method="post" class="form-signin">	
					<tr>
						<td><?php echo $row["Uname"]; ?></td>
                		
                		<td><?php echo $row["Password"]; ?></td>
                		
            		</tr>
				</form>	
			<?php	
				}
			}
			?>
			
		</tbody>
    </table>
	
		<form action ="" method="post" class="form-signin">
			<button name="add" class="btn btn-lg btn-primary btn-block" style="margin-left:54px;" type="submit">Add User</button></td>
		</form>
</body>
</html>	