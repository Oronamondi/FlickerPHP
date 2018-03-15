<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="text-center">
	<h1 class="jumbotron text-center">Register</h1>
	<!--<div class=" text-center">
		<a href="MedicineRegister.php" class="btn btn-outline-dark">ADD MED</a>/	
		<a href="PatientRegister.php" class="btn btn-outline-dark">ADD PATIENT</a>/		
		<a href="DoctorsRegister.php" class="btn btn-outline-dark">ADD DOCTOR</a>/		
		<a href="PatientReport.php" class="btn btn-outline-dark">PATIENT REPORT</a>	
		<a href="search2.php" class="btn btn-outline-dark">SEARCH</a>/		
		<a href="DelPatient.php" class="btn btn-outline-dark">DELETE PATIENT</a>/		
	</div>
	<br><br>-->
	<form method="POST" class= "text-center">
		<input type="text" name="username" placeholder="Enter Username">
		<br><br>
		<input type="password" name="password" placeholder="Enter password">
		<br><br>
		<input type="password" name="confirm" placeholder="Confirm Your  password">
		<br><br>
		<input type="email" name="email" placeholder="Enter email address">
		<br><br>
		
		<input type="submit" name="ok" class="btn btn-dark">
	
	</form><br>
	<a href="index.php">LOG IN</a>

	<?php
	
	$username= $_POST['username'];
	$password= $_POST['password'];
	$email= $_POST['email'];
	$confirm=$_POST['confirm'];
	 if ($password!=$confirm) {
	  	echo "Password do not match!";
	  	exit();//kill/stop
	  }
	  if (strlen($password)<8) {
	   	echo "Password must be more than 8-ters";
	   	exit();//exit
	   } 
	   if (!preg_match("#[0-9]+#", $password)) {
	   	echo "Password Must include numbers";
	   	exit();
	   }
	    if (!preg_match("#[A-Z]+#", $password)) {
	   	echo "Password Must include uppercase";
	   	exit();
	   }
	    if (!preg_match("#[a-z]+#", $password)) {
	   	echo "Password Must include lowercase";
	   	exit();
	   }
	    if (!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password)) {
	   	echo "Password Must include numbers";
	   	exit();
	   }
	   //md5
	   //WE USE BCRYPT
	   //encrypt password
	   $salt='$2a$07$R.gjb2U2N.FmZ4hPp1yCN$';
	   $newpass=crypt($password,$salt);
	   //$newpass is encrypted s we will pass it in query
	   $conn=mysqli_connect("localhost","root","","flicker_db");

   $res = mysqli_query($conn,"INSERT INTO users VALUES('$username','$newpass','$email')");

   if ($res==true) {
   	echo "Thank you. User $username Added Successfully";
   }
   else{
   	echo "Something went wrong. Try Again";
   }
	 ?>
   

</body>
</html>