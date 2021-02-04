
<?php

session_start();

$conn = mysqli_connect("mysql1.cs.clemson.edu","Base1_rjag","cbustam/Base1","Base1");

if(isset($_POST["submit"])){

$id = $_POST['cid'];

$out = $_POST['checkout'];

$in = $_POST['return'];

$price = $_POST['total'];

$s = " select * from Contract where ContractID = '$id'";

$result = mysqli_query($conn, $s);

$num = mysqli_num_rows($result);


$oldID = $_SESSION['c'];

if($num == 1 && $oldID != $id)
{
	echo "ID number already exists!";
	
}else{
	$updateContract = "update Contract set ContractID = '$id' , Check_out_Date = '$out' , Due_Date = '$in' , Total_Price = '$price' where ContractID = '$oldID'";
	mysqli_query($conn, $updateContract);
	
	$_SESSION['c']="";
	header('location:adminContract.php');
}

}

?>