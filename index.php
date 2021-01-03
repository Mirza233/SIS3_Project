 <!DOCTYPE html>
<html>
<head>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<style>
body {
  background-image: url("background.jpg");
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

</head>
<body>


<a href="index.php" class="btn btn-dark">Index Page</a>
<a href="register.php" class="btn btn-dark">Register</a>
<a href="login.php" class="btn btn-dark">Login</a>


<div align="center">

<h3 class="text">Let us Help you find your dream apartment</h3>
    <form id="login-form" method="post" action="authen_login.php" >
        <table border="0.5" >
            <tr>

                <td><input type="text" required="required"  name="search" id="search_id" placeholder="search"></td>
            </tr>

            <tr>
				
                <td><input type="submit" value="Submit" class="btn btn-secondary"/>
				
            </tr>
        </table>
    </form>
		</div>
</body>
</html> 
