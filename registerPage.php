<?php
	include "register.php";
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
<h3>First name</h3>
<input type="input" name="first" class="box" placeholder="First" aria-controls="example" required>
<h3>Last name</h3>
<input type="input" name="last" class="box" placeholder="Last" aria-controls="example" required>
<h3>Address</h3>
<input type="input" name="address" class="box" placeholder="Address" aria-controls="example" required>
<h3>Uname</h3>
<input type="input" name="uname" class="box" placeholder="Uname" aria-controls="example" required>
<h3>Password</h3>
<input type="input" name="password" class="box" placeholder="Password" aria-controls="example" required>
<h3>DL Number</h3>
<input type="input" name="dl" class="box" placeholder="DL Number" aria-controls="example" required>
</div>

<div class="right">
<h3>Card Type</h3>
<select required="" style="margin-bottom: 20px;" name="card" required>
              <option value="">Choose...</option>
              <option>Credit</option>
			  <option>Debit</option>
            </select>
         
<h3>Card Number</h3>
<input type="input" name="number" class="box" placeholder="Card Number" aria-controls="example" required>
<button name="register" class="btn btn-lg btn-primary btn-block" type="submit" style="width: 100px;margin-top:40px;">Apply</button>
</div>
</form>
</body>