<?php
	include "updateContract.php";
?>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
	
	<link type="text/css" rel="stylesheet" href="edituser.css">
	<title></title>
</head>
<body>
	<form action ="" method="post" class="form-signin">
		<div class="left">
			<h3>Contract ID</h3>
			<input type="input" name="cid" class="box" placeholder="ID" aria-controls="example" required>
			<h3>Check out date</h3>
			<input type="input" name="checkout" class="box" placeholder="yyyy-mm-dd" aria-controls="example" required>
			<h3>Return date</h3>
			<input type="input" name="return" class="box" placeholder="yyyy-mm-dd" aria-controls="example" required>
			<h3>Total Price</h3>
			<input type="input" name="total" class="box" placeholder="Total" aria-controls="example" required>
			
		</div>

     	<div class="right">    
			<button name="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width: 100px;margin-top:40px;">Apply</button>
		</div>
	</form>
</body>