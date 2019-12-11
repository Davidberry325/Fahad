<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
	<?php
	$con = mysqli_connect("localhost","root","","login.db");
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	session_start();
	if (isset($_POST['username'])){
	 $username = stripslashes($_REQUEST['username']);
	 $username = mysqli_real_escape_string($con,$username);
	 $password = stripslashes($_REQUEST['password']);
	 $password = mysqli_real_escape_string($con,$password);
	        $query = "SELECT * FROM `users` WHERE username='$username'
			and password='".md5($password)."'";
			 $result = mysqli_query($con,$query) or die(mysql_error());
			 $numbers = mysqli_num_rows($result);
			 $row = $result->fetch_assoc();
			 $query1 = "SELECT * FROM `company` WHERE name='".$row['company']."'";
			 $result1 = mysqli_query($con,$query1) or die(mysql_error());
			 $row1 = $result1->fetch_assoc();
			 $row1['url'];
			 // $url = "Location: ".$row1['url'];
	        if($numbers==1){
	     $_SESSION['username'] = $username;
	            // Redirect user to index.php
	     header("Location:".$row1['url']);
	         }else{
	 echo "<div class='form'>
	<h3>Username/password is incorrect.</h3>
	<br/>Click here to <a href='login.php'>Login</a></div>";
	 }
	    }else{
	?>
		<div class="form">
			<h1>Log In</h1>
			<form action="" method="post" name="login">
				<input type="text" name="username" placeholder="Username" required />
				<input type="password" name="password" placeholder="Password" required />
				<input name="submit" type="submit" value="Login" />
			</form>
			<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
		</div>
	<?php } ?>
	</body>
</html>