<?php  
 require('db_connect.php');
 session_start();

if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
	
// Assigning POST values to variables.
$username = $_POST['user_id'];
$password = $_POST['user_pass'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `User` WHERE Username='$username' and Password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){
    $ar = mysqli_fetch_array($result);
    if ($ar['banned']=='1'){
        echo "<script type='text/javascript'>alert('You are banned from using the app due to violation of Terms and Conditions.');window.location.href='login.php'</script>";
    }
    else{
	$_SESSION['logged_in'] = true;
    $_SESSION['user'] = $ar['username'];
    $row = $ar['Role_id'];
    if ($row == '1'){
    	$role = 'admin';
    }
    if ($row == '2'){
    	$role = 'student';
    }
    if ($row == '3'){
    	$role = 'landlord';
    }
    $_SESSION['role'] = $role;
    header("Location: home.php");}

}else{
echo "<script type='text/javascript'>alert('Invalid Login Credentials');window.location.href='login.php'</script>";
//echo "Invalid Login Credentials";
}
}
?>
