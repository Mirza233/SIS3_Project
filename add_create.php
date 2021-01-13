
  <?php
 session_start();
require('db_connect.php');
if (isset($_POST['name']) and isset($_POST['price']) and isset($_POST['address']) and isset($_POST['size'])){
$today_date = date("Y,m,d");
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$city = $_POST['city'];
$address = $_POST['address'];
$size =$_POST['size'];

$query = "SELECT ID FROM `City` WHERE Name = '$city'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$city_id =  mysqli_fetch_array($result)['ID'];

$query = "SELECT max(ID)+1 as 'ID' FROM `Accommodation`";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$id =  mysqli_fetch_array($result)['ID'];



$creator = $_SESSION['user'];

$query = "INSERT INTO `Accommodation` (ID,Name,Price,Description,City_id,Address, Creator_id,Date_added,Size) values ('$id','$name', '$price', '$description', '$city_id','$address','$creator','$today_date',$size)";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  echo "<script type='text/javascript'>location.href = 'home.php'</script>";
}
  echo "<script type='text/javascript'>location.href = 'login.php'</script>";

  ?>