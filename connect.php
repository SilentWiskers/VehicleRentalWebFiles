<?php

$conn = mysqli_connect("mysql1.cs.clemson.edu","Base1_rjag","cbustam/Base1","Base1");

if($conn)
{
	echo "Connection Successfull";
}
else
{
	echo "Connection failed";
}

?>