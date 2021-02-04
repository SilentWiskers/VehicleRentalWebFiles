<?php
	include "addVehicle.php";
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
<h3>VIN Number</h3>
<input type="input" name="vin" class="box" placeholder="VIN" aria-controls="example" required>
<h3>Year</h3>
<input type="input" name="year" class="box" placeholder="Year" aria-controls="example" required>
<h3>Make</h3>
<input type="input" name="make" class="box" placeholder="Make" aria-controls="example" required>
<h3>Model</h3>
<input type="input" name="model" class="box" placeholder="Model" aria-controls="example" required>
<h3>Vehicle Type</h3>
<input type="input" name="type" class="box" placeholder="Type" aria-controls="example" required>
<h3>Price</h3>
<input type="input" name="price" class="box" placeholder="Price" aria-controls="example" required>
</div>

<div class="right">
<h3>Available</h3>
<select required="" style="margin-bottom: 20px;" name="available" required>
              <option value="">Choose...</option>
              <option>Yes</option>
			  <option>No</option>
            </select>
         
<button name="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width: 100px;margin-top:40px;">Apply</button>
</div>
</form>
</body>