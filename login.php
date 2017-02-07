<?php
ini_set('session.gc_maxlifetime',10800);
 session_start();

 echo $_SESSION["email"];
 echo $_SESSION["pass"];
 if(isset($_SESSION["email"]) && isset($_SESSION["pass"]))
 {
 	echo "move";
 	header("location: validate2.php");
 }
 else
 {
 	echo "no";
 }
if(isset($_REQUEST["log"]))
{
	if($_REQUEST["log"]==1)
	{
		echo "inccorrect";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
  body {
        background-image: url("mon.jpg")

} 
</style>
</head>
<body>
<link rel="stylesheet" type="text/css" href="b.css">

 <form method="post" action="validate2.php">
  <div class="imgcontainer">
    <img src="image.png" width="150" height="150"alt="Image" class="avatar">
  </div>

  <div class="container">
  	
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Email" name="Email" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>  
    <input type="checkbox" checked="checked"> Remember me
    <br>
   <!-- <a href="www.dfds.com">Login</a>-->
   <input type="submit" name="submit" value="login">
   <br>
   <a href="sign_up.php">signup</a>
 
  </div>
  
</form>
</body>
</html>
