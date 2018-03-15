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
  <title>DeleteDoctor</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="text-center">
     <h1 class="jumbotron text-center">DELETE DOCTOR</h1>
      <div class=" text-center">
    <a href="MedicineRegister.php" class="btn btn-outline-dark">ADD MED</a>/    
    <a href="PatientRegister.php" class="btn btn-outline-dark">ADD PATIENT</a>/   
    <a href="DoctorsRegister.php" class="btn btn-outline-dark">ADD DOCTOR</a>/    
    <a href="PatientReport.php" class="btn btn-outline-dark">PATIENT REPORT</a>/    
      
    <a href="search2.php" class="btn btn-outline-dark">SEARCH</a>/    
    <a href="logout.php" class="btn btn-outline-dark">LOGOUT</a>    
  </div>
  <br><br>


     <form method="POST" class="text-center">
      <input type="text" name="doctor_id" placeholder="Enter Doctor ID to Delete"><br><br>
      <input type="submit" name="" class="btn btn-dark"><br>
     </form>

     <?php
     //We search by doctor_id
     $doctor_id=$_POST['doctor_id'];
       $conn=mysqli_connect("localhost","root","","flicker_db");
     //query
    $res = mysqli_query($conn,"SELECT * FROM doctors where doctor_id='$doctor_id'");
       //count $res to find out if any doctor was found
       if (mysqli_num_rows($res) < 1) {
        echo "No doctor found. Try Again.";
       }
       else{
        // else means, there is a doctor found
        //fetch selected record, $res has 1 row
         //our $res has a row, we fetch the row columns as an array
       while($colms = mysqli_fetch_array($res)){
        echo " ID was $colms[0] <br>";
        echo " dob was $colms[1] <br>";
        echo " first name was $colms[2] <br>";
        echo " last name was $colms[3] <br>";
        echo " gender was $colms[4] <br>";
        echo " Was Registered on $colms[5] <br>";
        $confirm="<script> window.confirm ('Are you sure?''>;</script>";
        echo  "$confirm";
        if ($confirm==true) {
         mysqli_query($conn, "DELETE FROM doctors WHERE doctor_id ='$doctor_id'");
        echo "Doctor  $doctor_id has been Deleted!";
        }
        }//end while
       
       }//end
      ?>

</body>
</html>