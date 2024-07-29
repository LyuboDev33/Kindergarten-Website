<?php 

$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {

  echo "There was a problem with the connection! :{";

}



?>