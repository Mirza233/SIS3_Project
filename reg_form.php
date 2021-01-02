<?php  
 require('db_connect.php');

if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['password_confirm'])){
	
// Assigning POST values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$confirm = $_POST['password_confirm'];


// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `User` WHERE Username='$username'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count >= 1){
//echo "Login Credentials verified";
echo "<script type='text/javascript'>alert('Username already exists')</script>";
$bool=False;
}else{
 $bool=True;
}

$query = "SELECT * FROM `User` WHERE Email='$email'";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);


if ($count >= 1){
//echo "Login Credentials verified";
echo "<script type='text/javascript'>alert('Email already exists')</script>";
$bool=False;
}
if (strlen($password)<6){
	$bool=False;
	echo "<script type='text/javascript'>alert('Password must be at least 6 characters long')</script>";
}

if ($password!==$confirm){
	$bool=False;
	echo "<script type='text/javascript'>alert('Passwords do not match')</script>";
}

if ($bool){
	echo "<script type='text/javascript'>alert('OKAY!')</script>";
}
}
?>
