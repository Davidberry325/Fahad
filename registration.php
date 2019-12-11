<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
    <?php
    $con = mysqli_connect("localhost","root","","login.db");
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    if (isset($_REQUEST['username'])){
     $username = stripslashes($_REQUEST['username']);
     $username = mysqli_real_escape_string($con,$username); 
     $email = stripslashes($_REQUEST['email']);
     $email = mysqli_real_escape_string($con,$email);
     $password = stripslashes($_REQUEST['password']);
     $password = mysqli_real_escape_string($con,$password);
     $company = stripslashes($_REQUEST['company']);
     $company = mysqli_real_escape_string($con,$company);
            $query = "INSERT into `users` (username, password, email, company)
    VALUES ('$username', '".md5($password)."', '$email', '$company')";
            $result = mysqli_query($con,$query);
            if($result){
                echo "<div class='form'>
    <h3>You are registered successfully.</h3>
    <br/>Click here to <a href='login.php'>Login</a></div>";
            }
        }else{
    ?>
        <div class="form">
            <h1>Registration</h1>
            <form name="registration" action="" method="post">
                <input type="text" name="username" placeholder="Username" required />
                <input type="email" name="email" placeholder="Email" required />
                <select class="company" name="company">
                	<option>Company</option>
                	<option>A</option>
                	<option>B</option>
                	<option>C</option>
                </select>
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" name="submit" value="Register" />
            </form>
        </div>
    <?php } ?>
    </body>
</html>