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



if($num == 1)
{
	echo "VIN already exists!";
}else{
	if($a == "No"){
		$updateVehicle = " insert into Vehicle(VIN , Year , Make , Model , Type , Price , Availability) values ('$v' , '$y' , '$ma' , '$mo' , '$t' , '$p' , 1)";
		mysqli_query($conn, $updateVehicle);
	}
	else{
		$updateVehicle = " insert into Vehicle(VIN , Year , Make , Model , Type , Price , Availability) values ('$v' , '$y' , '$ma' , '$mo' , '$t' , '$p' , 0)";
		mysqli_query($conn, $updateVehicle);
	}
	header('location:adminVehicle.php');
}

}

?>