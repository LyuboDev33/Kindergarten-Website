<?php 

require "../database/db-conn.php";

$dataContent = json_decode(file_get_contents('php://input'), true);


$id = $dataContent['eventID'];

$sqlGET = "SELECT * FROM event_dashboard WHERE ID =$id";
$queryGET = mysqli_query($conn, $sqlGET);

$completeArr = [];

while ($rowGET = mysqli_fetch_assoc($queryGET)) {

  $hours = $rowGET['set_hours'];
  $names = $rowGET['event_name'];

  $completeArr[] = $hours;
  $completeArr[] = $names;

    echo json_encode($completeArr);

    
}













?>