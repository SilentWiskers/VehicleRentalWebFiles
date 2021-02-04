<?php

function dateDiffInDays($date1, $date2)  
{ 
    // Calculating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1); 
      
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
} 

session_start();

$conn = mysqli_connect("mysql1.cs.clemson.edu","Base1_rjag","cbustam/Base1","Base1");

$today = date("Y-m-d");


if(isset($_POST["submit"])){

$vin = $_SESSION['v'];

$u = $_SESSION['username'];

$s = $_POST['start'];

$e = $_POST['end'];

$interval = dateDiffInDays($s, $e);


$getVehicle = " select * from Vehicle where VIN = '$vin'";

$result = mysqli_query($conn, $getVehicle);

$fetch = mysqli_fetch_assoc($result);

$row = $fetch["Price"];

$total = $row * $interval;


$num = rand(10000000, 99999999);

$getID = " select * from Contract where ContractID = '$num'";

$res = mysqli_query($conn, $getID);

$rows = mysqli_num_rows($res);

while($rows > 0){
	$num = rand(8, 8);

	$s = " select * from Contract where ContractID = '$num'";

	$res = mysqli_query($conn, $s);

	$rows = mysqli_num_rows($res);
}

$getCustomer = "select * from Customer where Uname = '$u'";
$r = mysqli_query($conn, $getCustomer);
$get = mysqli_fetch_assoc($r);
$dl = $get["DL"];

$updateVehicle = "update Vehicle set Availability = 1 where VIN = '$vin'";
mysqli_query($conn, $updateVehicle);

$addContract = " insert into Contract(ContractID , Check_out_Date , Due_Date , Total_Price , DL , VIN) values ('$num' , '$s' , '$e' , '$total' , '$dl', '$vin')";
mysqli_query($conn, $addContract);

header('location:returnVehicle.php');

}

?>