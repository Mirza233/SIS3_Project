<?php  
 require('db_connect.php');

if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['password_confirm'])){
	
// Assigning POST values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$confirm = $_POST['password_confirm'];
$role_name = $_POST['role'];
if ($role_name == 'Student'){
	$role = 2;
}else{
	$role=3;
}
//$role=3;

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `User` WHERE Username='$username'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count >= 1){
//echo "Login Credentials verified";
echo "<script type='text/javascript'>alert('Username already exists');window.location.href='register.php'</script>";
$bool=False;
}else{
 $bool=True;
}

$query = "SELECT * FROM `User` WHERE Email='$email'";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);


if ($count >= 1){
//echo "Login Credentials verified";
echo "<script type='text/javascript'>alert('Email already exists');window.location.href='register.php'</script>";
$bool=False;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$bool=False;
	echo "<script type='text/javascript'>alert('Email format wrong');window.location.href='register.php'</script>";
}

if (strlen($password)<6){
	$bool=False;
	echo "<script type='text/javascript'>alert('Password must be at least 6 characters long');window.location.href='register.php'</script>";
}

if ($password!==$confirm){
	$bool=False;
	echo "<script type='text/javascript'>alert('Passwords do not match');window.location.href='register.php'</script>";
}

if ($bool){
	echo "<script type='text/javascript'>alert('OKAY!')</script>";
	$query = "INSERT INTO `User` (Username,Password,email,Role_id,banned) values ('$username', '$password', '$email', '$role','0')";
 
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	echo "<script type='text/javascript'>location.href = 'login.php'</script>";
}
}
?>