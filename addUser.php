<?php

session_start();

$conn = mysqli_connect("mysql1.cs.clemson.edu","Base1_rjag","cbustam/Base1","Base1");

if(isset($_POST["submit"])){

$name = $_POST['uname'];

$pass = $_POST['password'];

$fname = $_POST['first'];

$lname = $_POST['last'];

$addr = $_POST['address'];

$DL = $_POST['dl'];

$type = $_POST['card'];

$cardn = $_POST['number'];

$s = " select * from Login where Uname = '$name'";

$result = mysqli_query($conn, $s);

$num = mysqli_num_rows($result);


$s = " select * from Customer where DL = '$DL'";

$result = mysqli_query($conn, $s);

$numb = mysqli_num_rows($result);


if($num == 1)
{
	echo "User name already exists!";
}else if($numb == 1){
	echo "Drive Lisence already exists!";
}else{
	$updateCustomer = " insert into Customer(First , Last , Address , Card_Num , Card_Type , DL , Uname) values ('$fname' , '$lname' , '$addr' , '$cardn' , '$type' , '$DL' , '$name')";
	$updateLogin = " insert into Login(Uname , Password , Type) values ('$name' , '$pass' , 0)";
	mysqli_query($conn, $updateCustomer);
	mysqli_query($conn, $updateLogin);
	
	header('location:adminUser.php');
}

}

?>