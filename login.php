<!DOCTYPE html >
<html>
<head>
<title>LOGIN FORM</title>
<!--link rel="stylesheet" type="text/css"-->
<link rel="stylesheet" href="style.css">

</head>
<body id="body_bg">
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
<div align="center">

<h3>LOGIN FORM</h3>
    <form id="login-form" method="post" action="authen_login.php" >
        <table border="0.5" >
            <tr>
                <td><label for="user_id">User Name</label></td>
                <td><input type="text" required="required"  name="user_id" id="user_id"></td>
            </tr>
            <tr>
                <td><label for="user_pass">Password</label></td>
                <td><input type="password" name="user_pass" required="required" id="user_pass"></input></td>
            </tr>
			
            <tr>
				
                <td><input type="submit" value="Submit" />
                <td><input type="reset" value="Reset"/>
				
            </tr>
        </table>
    </form>
		</div>
</body>
</html>
