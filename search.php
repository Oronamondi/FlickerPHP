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
		<a href="search.php" class="btn btn-outline-dark">SEARCH</a>/	
    <a href="DelPatient.php" class="btn btn-outline-dark">DEL PATIENT</a>/  	
	</div>
	<br><br>


     <form method="POST" class="text-center">
     	<input type="text" name="fname" placeholder="Enter Patient Name to search"><br><br>
     	<input type="submit" name="" class="btn btn-dark"><br>
     </form>

     <?php
     //We search by fname
     $fname=$_POST['fname'];
       $conn=mysqli_connect("localhost","root","","flicker_db");
     //query
       $res = mysqli_query($conn,"SELECT * FROM patients where fname LIKE '$fname%'");
       //count $res to find out if any patient was found
       if (mysqli_num_rows($res) < 1) {
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
       	echo " gender was $colms[4] <br>";
       	echo " Was Registered on $colms[5] <br> <br>";
       }//end while
       }//end
      ?>

</body>
</html>