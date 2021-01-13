  
<?php 
session_start();
require('db_connect.php');
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    header("Location: index.php");
  if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'landlord')
    header("Location: index.php");?>
  <!DOCTYPE html>
<html>
<head>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


</head>
<body>
<style>
  .slidecontainer {
  width: 100%; /* Width of the outside container */
}

/* The slider itself */
.slider {
  -webkit-appearance: none;  /* Override default CSS styles */
  appearance: none;
  width: 100%; /* Full-width */
  height: 25px; /* Specified height */
  background: #d3d3d3; /* Grey background */
  outline: none; /* Remove outline */
  opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
  -webkit-transition: .2s; /* 0.2 seconds transition on hover */
  transition: opacity .2s;
}

/* Mouse-over effects */
.slider:hover {
  opacity: 1; /* Fully shown on mouse-over */
}

/* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */
.slider::-webkit-slider-thumb {
  -webkit-appearance: none; /* Override default look */
  appearance: none;
  width: 25px; /* Set a specific slider handle width */
  height: 25px; /* Slider handle height */
  background: #4CAF50; /* Green background */
  cursor: pointer; /* Cursor on hover */
}

.slider::-moz-range-thumb {
  width: 25px; /* Set a specific slider handle width */
  height: 25px; /* Slider handle height */
  background: #4CAF50; /* Green background */
  cursor: pointer; /* Cursor on hover */
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

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
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

/* Overwrite default styles of hr */
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
  echo '<a href="edit.php" class="btn btn-dark">Edit your ads</a>';}
  ?>



 <form  action="add_create.php" method="POST">
  <div class="container">
    <h1>Create an ad:</h1>
    <p>Please fill in this form to create an ad.</p>
    <hr>

    <label for="name"><b>Name of the ad</b></label>
    <input type="text" placeholder="Enter Name of the ad" name="name" id="name" required>

<label for="price"><b>Price[€]</b></label>
<div class="slidecontainer">

  <input id="rangeInput" type="range" min="50" max="2000" value="200" class="slider" oninput="amount.value=rangeInput.value"/>
    <input id="amount" type="number" value="200" min="0" max="2000" oninput="rangeInput.value=amount.value"  name="price"/>

</div>

    <label for="desctiption"><b>Description</b></label>
    <input type="text" placeholder="Enter Description" name="description" id="description" >
<select name="city" id="city">
            <?php 

            $query = "SELECT * FROM City ORDER BY ID";
            $result = mysqli_query($connection, $query) or die(mysql_error()."[".$query."]");
            while ($row = mysqli_fetch_array($result))
            {
                echo "<option value=".$row['Name'].">".$row['Name']."</option>";
            }
            ?> 
        </select>
    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Address" name="address" id="address" required>

<label for="size"><b>Size[m^2]</b></label>
    <div class="slidecontainer">
   <input id="sizeInput" type="range" min="10" max="300" value="60" class="slider" oninput="sz.value=sizeInput.value"/>
    <input id="sz" type="number" value="60" min="10" max="300" oninput="sizeInput.value=sz.value"  name="size"/>

</div>

    <hr>

      <button type="submit" class="create">Create</button>
  </div>

</form>

  </body>
  </html>
