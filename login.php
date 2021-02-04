<?php
	include "log_in.php";

?>
  <link type="text/css" rel="stylesheet" href="signin.css">
  <body>
  <form action ="" method="post" class="form-signin">
  	<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  
  	<input type="uname" name="uname" class="form-control" placeholder="Uname" autofocus>
  
  	<input type="password" name="password" class="form-control" placeholder="Password" >
  
  	<button name="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width: 100px;margin-left: 100px;">Sign in</button>
  
  	<p class="text-center" style="color:red;">
		<?php echo $message; ?>
	</p>
  
  	<p>Don't have an account? <a href="registerPage.php"> Make one here</a></p>
  
  </form>
</body>
</html>
