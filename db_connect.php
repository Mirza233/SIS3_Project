<?php
$connection = mysqli_connect('localhost', 'codeigniter', 'codeigniter2019');
if (!$connection){
    die("Database Connection Failed");
}
$select_db = mysqli_select_db($connection, '89181102');
if (!$select_db){
    die("Database Selection Failed");
}

