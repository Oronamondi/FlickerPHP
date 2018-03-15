<?php 
session_start();
//check if session is not set
if (!isset($_SESSION['x'])) {
  echo"ACCESS DENIED. PLEASE LOGIN";
  echo "<a href=index.php>CLICK TO LOGIN</a>";
  exit();//STOP PROGRAM
}
//IF SESSION EXISTS
else{
  $email = $_SESSION['x'];//get the session
  //store it in $email
  echo "<h4>LOGGED IN AS : $email Welcome.</h4>";
 
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>PatientRegister</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="text-center">
	<h1 class="jumbotron text-center">Add A Patient</h1>
	<div class=" text-center">
		<a href="MedicineRegister.php" class="btn btn-outline-dark">ADD MED</a>/	
		<a href="PatientRegister.php" class="btn btn-outline-dark">ADD PATIENT</a>/		
		<a href="DoctorsRegister.php" class="btn btn-outline-dark">ADD DOCTOR</a>/		
		<a href="PatientReport.php" class="btn btn-outline-dark">PATIENT REPORT</a>	
		<a href="search2.php" class="btn btn-outline-dark">SEARCH</a>/		
		<a href="DelPatient.php" class="btn btn-outline-dark">DELETE PATIENT</a>/		
		<a href="logout.php" class="btn btn-outline-dark">LOGOUT</a>		
	</div>
	<br><br>
	<form method="POST" class= "text-center">
		<input type="text" name="patient_id" placeholder="Enter ID">
		<br><br>
		Select DOB <br>
		<input type="date" name="dob" ><br><br>
		<input type="text" name="fname" placeholder="Enter First Name">
		<br><br>
		<input type="text" name="lname" placeholder="Enter Last Name">
		<br><br>
		Select gender <br>
		<input type="radio" name="gender">Male
		<input type="radio" name="gender">Female
		<br><br>
		Enter reg date:<br>
		<input type="date" name="reg_date" ><br><br>
		<input type="submit" name="ok" class="btn btn-dark">


		
	</form>

	<?php
	$patient_id= $_POST['patient_id'];
	$dob= $_POST['dob'];
	$fname= $_POST['fname']; 
	$lname= $_POST['lname'];
	$gender= $_POST['gender']; 
	$reg_date= date("y/m/d h:m:s");//system date
	//after receiving from the form, save them to DB
    $conn=mysqli_connect("localhost","root","","flicker_db");

   $res = mysqli_query($conn,"INSERT INTO patients VALUES('$patient_id','$dob','$fname','$lname','$gender','$reg_date')");

   if ($res==true) {
   	echo "Thank you. Patient $fname Added Successfully";
   }
   else{
   	echo "Something went wrong. Try Again";
   }
	 ?>
   

</body>
</html>