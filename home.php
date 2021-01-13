  
<?php 
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    header("Location: index.php");?>
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
  echo '<a href="edit.php" class="btn btn-dark">Edit your ads</a>';}
  ?>

<div align="center">

<?php echo '<h3 class="text">You are Logged in as '.$_SESSION['role'].'</h3>';?>

    <form id="login-form" method="post" >
        <table border="0.5" >
            <tr>

                <td><input type="text"  name="search" id="search_id" placeholder="search"></td>
              <select name="city" id="city">
            <?php 
            while ($row = mysqli_fetch_array($result))
            {
                echo "<option value=".$row['Name'].">".$row['Name']."</option>";
            }
            ?> 
        </select>
            </tr>

            <tr>
        
                <td><input type="Submit" value="Submit" name="Submit" class="btn btn-secondary"/>
        
            </tr>
        </table>

        <?php
          if (isset($_POST['Submit']))  {
            $city = $_POST["city"];
            $name = $_POST["search"];
            $search_query= "SELECT * FROM `Accommodation` WHERE Name like '%$name%' and City_id = (Select ID from City WHERE City.Name = '$city')";
            $result = mysqli_query($connection, $search_query) or die(mysqli_error($connection));?>

              <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price[€]</th>
                    <th scope="col">Size[m^2]</th>
                  </tr>   
                  <?php
            while ($row = mysqli_fetch_array($result)){
            echo '<tr>
      <td>'.$row['Name'].'</td>
      <td>'.$row['Price'].'</td>
      <td>'.$row['Size'].'</td>
    </tr>';
 
           //echo '<br /> Price: '.$row['Price'];  
           // echo '<br /> Size: '.$row['Size'];  
            //Todo: Image, Creator!!!
            }  
          
        }

        ?>

    </form>
    </div>
</body>
</html> 
