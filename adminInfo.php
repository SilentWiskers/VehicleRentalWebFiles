<?php
session_start();

$conn = mysqli_connect("mysql1.cs.clemson.edu","Base1_rjag","cbustam/Base1","Base1");


if(isset($_POST["edit"])){
	$_SESSION['u'] = $_GET["uname"];
	header('location:editAdmin.php');
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
				<th>Employee SSN</th>
				<th>Salary</th>
				<th>User Name</th>
                
            </tr>
        </thead>
		<tbody>
			
			<?php 
			$u = $_SESSION['username'];
			$query = "SELECT * FROM Employee WHERE Uname = '$u'";
			$result = mysqli_query($conn, $query);
			
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
			?>	
				<form action ="adminInfo.php?uname=<?php echo $row["Uname"]; ?>" method="post" class="form-signin">	
					<tr>
						<td><?php echo $row["First"]; ?></td>
                		
                		<td><?php echo $row["Last"]; ?></td>
                		<td><?php echo $row["Address"]; ?></td>
						<td><?php echo $row["ESSN"]; ?></td>
						<td><?php echo $row["Salary"]; ?></td>
						
						<td><?php echo $row["Uname"]; ?></td>
                		<td><button name="edit" class="btn btn-lg btn-primary btn-block" type="submit">Edit User</button></td>
						
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
			$query = "SELECT * FROM Login WHERE Type = 1";
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
	
</body>
</html>