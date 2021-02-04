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


$oldname = $_SESSION['u'];
$oldDL = $_SESSION['d'];

if($num == 1 && $oldname != $name)
{
	echo "User name already exists!";
}else if($numb == 1 && $oldDL != $DL){
	echo "Drive Lisence already exists!";
}else{
	$updateLogin = "update Login set Uname = '$name' , Password = '$pass' , Type = 0 where Uname = '$oldname'";
	$updateCustomer = "update Customer set First = '$fname' , Last = '$lname' , Address = '$addr' , Card_Num = '$cardn' , Card_Type = '$type' , DL = '$DL' , Uname = '$name' where Uname = '$oldname'";
	mysqli_query($conn, $updateLogin);
	mysqli_query($conn, $updateCustomer);
	
	$_SESSION['u']="";
	$_SESSION['d']="";
	$_SESSION['username']=$name;
	header('location:userInfo.php');
}

}

?>