<?php

session_start();

$conn = mysqli_connect("mysql1.cs.clemson.edu","Base1_rjag","cbustam/Base1","Base1");

if(isset($_POST["submit"])){

$v = $_POST['vin'];

$y = $_POST['year'];

$ma = $_POST['make'];

$mo = $_POST['model'];

$t = $_POST['type'];

$p = $_POST['price'];

$a = $_POST['available'];

$s = " select * from Vehicle where VIN = '$v'";

$result = mysqli_query($conn, $s);

$num = mysqli_num_rows($result);

$oldvin = $_SESSION['v'];



if($num == 1 && $oldvin != $v)
{
	echo "VIN already exists!";
}else{

	if($a == "No"){
		$updateVehicle = "update Vehicle set VIN = '$v' , Year = '$y' , Make = '$ma' , Model = '$mo' , Type = '$t' , Price = '$p' , Availability = 1 where VIN = '$oldvin'";
		mysqli_query($conn, $updateVehicle);
		
	}else{
		$updateVehicle = "update Vehicle set VIN = '$v' , Year = '$y' , Make = '$ma' , Model = '$mo' , Type = '$t' , Price = '$p' , Availability = 0 where VIN = '$oldvin'";
		mysqli_query($conn, $updateVehicle);
		
	}
	
	$_SESSION['v'] = "";
	header('location:adminVehicle.php');
}


}

?>