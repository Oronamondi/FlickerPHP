<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="text-center">
	<h1 class="jumbotron">MEMBER SIGN IN</h1>
 <form method="POST" class= "text-center">
		
		<input type="email" name="email" placeholder="Enter email address">
		<br><br>
		
		<input type="password" name="password" placeholder="Enter password">
		<br><br>	
		<input type="submit" name="ok" class="btn btn-dark">
 </form><br>
 Not registered?
 <a href="users.php">Click here</a>
 <?php 
  $conn=mysqli_connect("localhost","root","","flicker_db");
  $email= mysqli_real_escape_string($conn,$_POST['email']);
  $password= mysqli_real_escape_string($conn,$_POST['password']);
    
   
    if (empty($email)) {
    	echo "Email is empty";
        exit();
    }
   
    if (empty($password)) {
    	echo "Password is empty";
    	exit();
    }
     //encrypt user password since the one in the table is encrypted as well, the SALT used must be same in register and login
    $salt='$2a$07$R.gjb2U2N.FmZ4hPp1yCN$';
	$newpass=crypt($password,$salt);
     

    //We now do the SQL
    $res = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' AND password = '$newpass'");
    //We parse the encrypted password
    //count $res to find out if a row was found or not
    if (mysqli_num_rows($res)<1) {
    	echo "NO MATCH. FAILED";
    }
    else{
        session_start();//start session
        $_SESSION['x']=$email;//store email in the session
    	echo "MATCH FOUND. SUCCESSFUL LOGIN";
    	header("location: search2.php");//Redirect page
    }//end

  ?>


</body>
</html>