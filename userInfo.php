<?php
session_start();

$conn = mysqli_connect("mysql1.cs.clemson.edu","Base1_rjag","cbustam/Base1","Base1");

if(isset($_POST["edit"])){
	$_SESSION['u'] = $_GET["uname"];
	$_SESSION['d'] = $_GET["dl"];
	header('location:userEdit.php');
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
                
            </tr>
        </thead>
		<tbody>
			
			<?php 
			$u = $_SESSION['username'];
			$query = "SELECT * FROM Customer WHERE Uname = '$u'";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
			
			?>	
				<form action ="userInfo.php?uname=<?php echo $row["Uname"]; ?>&dl=<?php echo $row["DL"]; ?>" method="post" class="form-signin">	
					<tr>
						<td><?php echo $row["First"]; ?></td>
                		
                		<td><?php echo $row["Last"]; ?></td>
                		<td><?php echo $row["Address"]; ?></td>
						<td><?php echo $row["Card_Num"]; ?></td>
						<td><?php echo $row["Card_Type"]; ?></td>
						<td><?php echo $row["DL"]; ?></td>
						
                		<td><button name="edit" class="btn btn-lg btn-primary btn-block" type="submit">Edit Info</button></td>
            		</tr>
				</form>	
			
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
			$query = "SELECT * FROM Login WHERE Uname = '$u'";
			$res = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($res);
			
			?>	
				<form action ="" method="post" class="form-signin">	
					<tr>
						<td><?php echo $row["Uname"]; ?></td>
                		
                		<td><?php echo $row["Password"]; ?></td>
                		
            		</tr>
				</form>	
						
		</tbody>
    </table>
	
</body>
</html>	