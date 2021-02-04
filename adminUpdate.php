<?php

session_start();

$conn = mysqli_connect("mysql1.cs.clemson.edu","Base1_rjag","cbustam/Base1","Base1");

if(isset($_POST["submit"])){

$name = $_POST['uname'];

$pass = $_POST['password'];

$fname = $_POST['first'];

$lname = $_POST['last'];

$addr = $_POST['address'];

$SSN = $_POST['essn'];

$sal = $_POST['salary'];



$oldname = $_SESSION['u'];

	$updateLogin = "update Login set Uname = '$name' , Password = '$pass' , Type = 1 where Uname = '$oldname'";
	$updateEmployee = "update Employee set First = '$fname' , Last = '$lname' , Address = '$addr' , ESSN = '$SSN' , Salary = '$sal' , Uname = '$name' where Uname = '$oldname'";
	mysqli_query($conn, $updateLogin);
	mysqli_query($conn, $updateEmployee);
	
	$_SESSION['u']="";
	$_SESSION['username'] = $name;
	header('location:adminInfo.php');


}

?>