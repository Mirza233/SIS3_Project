<?php 
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    header("Location: index.php");


?>
  <!DOCTYPE html>
<html>
<head>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


</head>
<body>
<style>
  body {
  background-image: url("bck.jpeg");
  background-repeat: no-repeat;
  background-size: cover;
  color: lightgrey;
}

h3 {
  background-color: blue;
  color: white;
}
input {
  position: static;
}
</style>
<?php
require('db_connect.php');

$query = "SELECT * FROM City ORDER BY ID";
$result = mysqli_query($connection, $query) or die(mysql_error()."[".$query."]");
?>

<a href="home.php" class="btn btn-dark">Index Page</a>
<a href="register.php" class="btn btn-dark">Register</a>
<a href="index.php" class="btn btn-dark">Logout</a>
<?php if ($_SESSION['role'] == 'admin'){
  echo '<a href="admin.php" class="btn btn-dark">Admin Page</a>';}?>
<?php if ($_SESSION['role'] == 'landlord'){
  echo '<a href="create.php" class="btn btn-dark">Create ad</a>';
  ?>

<div align="center">

<?php echo '<h3 class="text">Your Created ads '.$_SESSION['username'].'</h3>';?>
        <?php
        	$user = $_SESSION['user'];
            $search_query= "SELECT * FROM `Accommodation` WHERE 
            Creator_id = '$user'";
            $result = mysqli_query($connection, $search_query) or die(mysqli_error($connection));?>

              <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price[€]</th>
                    <th scope="col">Size[m^2]</th>
                    <th scope="col">EDIT</th>     
                    <th scope="col">DELETE</th>                  
                </tr>   
                  <?php
                  function delete($id){
					require('db_connect.php');
					  
				  	$ban_query = "DELETE FROM `Accommodation` WHERE ID = '$id'";
				  	mysqli_query($connection, $ban_query) or die(mysqli_error($connection));
					header("Refresh:0");
					}



            while ($row = mysqli_fetch_array($result)){
            	$id = $row['ID'];
            	$edit_name = $row['Name'];
            echo '<tr>
      <td>'.$row['Name'].'</td>
      <td>'.$row['Price'].'</td>
      <td>'.$row['Size'].'</td>
      <td><a href="?'.$edit_name.'=true">edit</a></td>
      <td><a href="?'.$id.'=true">delete</a></td>
    </tr>';

        if(isset($_GET[$id])){
    		delete($id);}
    	
	    if(isset($_GET[$edit_name])){
	    	$_SESSION['Ac_id'] = $row['ID'];
    		$_SESSION['Name'] = $row['Name'];
    		$_SESSION['Price'] = $row['Price'];
    		$_SESSION['Description'] = $row['Description'];
    		$_SESSION['Size'] = $row['Size'];
    		$_SESSION['Address'] = $row['Address'];
    		$_SESSION['City_id'] = $row['City_id'];
    		echo "<script type='text/javascript'>window.location.href='edit_form.php'</script>";
    	}
    }}

        ?>

    </div>
</body>
</html> 