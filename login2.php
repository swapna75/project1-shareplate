<?php include('server2.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="total">
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login2.php">
  	<?php include('errors2.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<a href="foodAvailable.php"><button type="submit" class="btn" name="login_user">Login</button></a>
  	</div>
  	<p>
  		Not yet a member? <a href="register2.php">Sign up</a>
  	</p>
  </form>
</div>
</body>
</html>