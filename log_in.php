<?php

session_start();

$conn = mysqli_connect("mysql1.cs.clemson.edu","Base1_rjag","cbustam/Base1","Base1");
$message = "";
if(isset($_POST["submit"])){

$name = $_POST['uname'];

$pass = $_POST['password'];

$s = " select * from Login where Uname = '$name' && Password = '$pass'";

$result = mysqli_query($conn, $s);

$getType = mysqli_fetch_assoc($result);

$type = $getType['Type'];

$num = mysqli_num_rows($result);

if($num == 1 && $type == 0)
{
	$_SESSION['username'] = $name;
	header('location:userHome.php');
	
}else if($num == 1 && $type == 1){
	$_SESSION['username'] = $name;
	header('location:adminHome.php');
	
}else{
	$message = "Invalid Username or Password";
}

}
?>