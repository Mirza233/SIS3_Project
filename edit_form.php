<?php 
session_start();
require('db_connect.php');
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    header("Location: index.php");
  if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'landlord')
    header("Location: home.php");?>
  <!DOCTYPE html>
<html>
<head>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


</head>
<body>
<style>
  .slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;  
  appearance: none;
  width: 100%; 
  height: 25px; 
  background: #d3d3d3; 
  outline: none; 
  opacity: 0.7;
  -webkit-transition: .2s; 
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1; 
}


.slider::-webkit-slider-thumb {
  -webkit-appearance: none; 
  appearance: none;
  width: 25px; 
  height: 25px; 
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px; 
  height: 25px; 
  background: #4CAF50; 
  cursor: pointer; 
}
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

* {box-sizing: border-box}

.container {
  padding: 16px;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
.create {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.create:hover {
  opacity:1;
}
a {
  color: dodgerblue;
}
</style>

<a href="home.php" class="btn btn-dark">Index Page</a>
<a href="register.php" class="btn btn-dark">Register</a>
<a href="index.php" class="btn btn-dark">Logout</a>
<?php if ($_SESSION['role'] == 'landlord'){
  echo '<a href="edit.php" class="btn btn-dark">View your ads</a>';}
  ?>



 <form  method="POST">
  <div class="container">
    <h1>Edit your ad:</h1>
    <p>Enter the data you want to edit.</p>
    <hr>

    <label for="name"><b>Name of the ad</b></label>
    <?php $Name = $_SESSION['Name'];
    echo '<input type="text" placeholder="Enter Name of the ad" name="name" id="name" required value = "'.$Name.'">';
    ?>

<label for="price"><b>Price[€]</b></label>
<div class="slidecontainer">
<?php $Price = $_SESSION['Price'];

  echo '<input id="rangeInput" type="range" min="50" max="2000" value="'.$Price.'" class="slider" oninput="amount.value=rangeInput.value"/>';
    echo '<input id="amount" type="number" value="'.$Price.'" min="0" max="2000" oninput="rangeInput.value=amount.value"  name="price"/>'
    ?>

</div>
<?php $Description = $_SESSION['Description'];?>
    <label for="desctiption"><b>Description</b></label>
    <?php echo '<input type="text" placeholder="Enter Description" name="description" id="description" value = "'.$Description.'">'; ?>
<select name="city" id="city">
            <?php 
            $City = $_SESSION["City_id"];
            $query = "SELECT * FROM City WHERE ID = '$City'";
            $result = mysqli_query($connection, $query) or die(mysql_error()."[".$query."]");
            $City=mysqli_fetch_array($result)['Name'];

            $query = "SELECT * FROM City ORDER BY ID";
            $result = mysqli_query($connection, $query) or die(mysql_error()."[".$query."]");
            while ($row = mysqli_fetch_array($result))
            {
              if ($row['Name']==$City){
                echo "<option selected='selected' value=".$row['Name'].">".$row['Name']."</option>";
              }
              else{
                echo "<option value=".$row['Name'].">".$row['Name']."</option>";
              }
              }
            
            ?> 
        </select>
    <label for="address"><b>Address</b></label>
    <?php
    $Address = $_SESSION['Address'];
    echo '<input type="text" placeholder="Address" name="address" id="address" required value = "'.$Address.'">' ?>
<?php $Size = $_SESSION['Size']?>
<label for="size"><b>Size[m^2]</b></label>
    <div class="slidecontainer">
      <?php $Size = $_SESSION['Size'];
   echo '<input id="sizeInput" type="range" min="10" max="300" value="'.$Size.'" class="slider" oninput="sz.value=sizeInput.value"/>
    <input id="sz" type="number" value="'.$Size.'" min="10" max="300" oninput="sizeInput.value=sz.value"  name="size"/>'; ?>

</div>

    <hr>

      <button type="submit" class="create">Submit</button>
  </div>

</form>

  </body>
  </html>

  <?php

  if (isset($_POST['name']) and isset($_POST['price']) and isset($_POST['address']) and isset($_POST['size'])){
  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $address = $_POST['address'];
  $size =$_POST['size'];

  $city = $_POST['city'];
  $query = "SELECT ID FROM `City` WHERE Name = '$city'";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  $city_id =  mysqli_fetch_array($result)['ID'];

  $ID = $_SESSION['Ac_id'];

  $query = "UPDATE `Accommodation` SET Name='$name', Price='$price', Description='$description', City_id='$city_id', Address='$address', Size='$size' WHERE ID='$ID'";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    echo "<script type='text/javascript'>location.href = 'edit.php'</script>";
}
  //echo "<script type='text/javascript'>location.href = 'login.php'</script>";

  ?>