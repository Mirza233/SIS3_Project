<?php 
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    header("Location: index.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin')
    header("Location: index.php");


		  function ban($ID){
		  	require('db_connect.php');
		  	$role =  "SELECT Role_id FROM `User` WHERE User.ID = '$ID'";
		  	$ban_query = "UPDATE `User` SET banned = '1' WHERE User.ID = '$ID'";
		  	$role_id = mysqli_query($connection, $role) or die(mysqli_error($connection));
		  	if (mysqli_fetch_array($role_id)['Role_id']=='1'){
				return "";
		  }
		  else{
		  	return mysqli_query($connection, $ban_query) or die(mysqli_error($connection));
		}

		  }
		  
?>

YOU ARE ADMIN!

        <form id="login-form" method="post" >
        <table border="0.5" >
            <tr>

                <td><input type="text"  name="search" id="search_id" placeholder="Find user"></td>
            </tr>

            <tr>
                <td><input type="Submit" value="Ban" name="Submit" class="btn btn-secondary"/>
            </tr>
        </table>

<?php

		  require('db_connect.php');
          if (isset($_POST['Submit']))  {
            $name = $_POST["search"];
            $search_query= "SELECT * FROM `User` WHERE username like '%$name%'";
            $result = mysqli_query($connection, $search_query) or die(mysqli_error($connection));?>

              <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
					<th scope="col">Role_id</th>
					<th scope = "col">Ban</th>

                  </tr>   
                  <?php
            while ($row = mysqli_fetch_array($result)){
            	$ID = $row['ID'];
            echo '<tr>
      <td>'.$row['ID'].'</td>
      <td>'.$row['Username'].'</td>
      <td>'.$row['email'].'</td>
      <td>'.$row['Role_id'].'</td>
      <td><a href="?'.$ID.'=true">Ban</a></td>
    </tr>';
    if(isset($_GET[$ID])){
    ban($ID);
}
            }  
          
        }

        ?>