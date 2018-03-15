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
	<title>PatientSearch</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="text-center">
     <h1 class="jumbotron text-center">PATIENT SEARCH</h1>
     	<div class=" text-center">
		<a href="MedicineRegister.php" class="btn btn-outline-dark">ADD MED</a>/		
		<a href="PatientRegister.php" class="btn btn-outline-dark">ADD PATIENT</a>/		
		<a href="DoctorsRegister.php" class="btn btn-outline-dark">ADD DOCTOR</a>/		
		<a href="PatientReport.php" class="btn btn-outline-dark">PATIENT REPORT</a>/		
		<a href="" class="btn btn-outline-dark">MED REPORT</a>/			
    <a href="DelPatient.php" class="btn btn-outline-dark">DEL PATIENT</a>/   
    <a href="logout.php" class="btn btn-outline-dark">LOGOUT</a>  	
	</div>
	<br><br>


     <form method="POST" class="text-center">
      <input type="text" name="fname" placeholder="Enter First Name to search"><br><br>
     	<input type="text" name="lname" placeholder="Enter Last Name to search"><br><br>
     	<input type="submit" name="" class="btn btn-dark"><br>
     </form>

     <?php
     //We search by fname and lname
     $fname=$_POST['fname'];
     $lname=$_POST['lname'];
       $conn=mysqli_connect("localhost","root","","flicker_db");
     //query
       $res = mysqli_query($conn,"SELECT * FROM patients where fname = '$fname' AND lname='$lname'");
       //count $res to find out if any patient was found
       if (mysqli_num_rows($res) ==0) {
       	echo "No patient found. Try Again.";
       }
       else{
       	// else means, there is a patient found
       	//fetch selected record, $res has 1 row
       	//our $res has a row, we fetch the row columns as an array
        while($colms =	mysqli_fetch_array($res)){
       	echo " ID was $colms[0] <br>";
       	echo " dob was $colms[1] <br>";
       	echo " First name was $colms[2] <br>";
       	echo " Last name was $colms[3] <br>";
       	echo " Gender was $colms[4] <br>";
       	echo " Was Registered on $colms[5] <br> <br>";
       }//end while
       }//end
      ?>

</body>
</html>