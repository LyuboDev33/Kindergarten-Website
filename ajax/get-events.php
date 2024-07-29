<?php 


require "../database/db-conn.php";

$dataContent = json_decode(file_get_contents('php://input'), true);


$sql = "SELECT * FROM event_dashboard"; 
$query = mysqli_query($conn, $sql);

$arrEvents = array(); 
$arrIDS = array();
$timeArr = array();

while($row = mysqli_fetch_assoc($query)) {
  $arrEvents[] = $row['event_name']; 
  $arrIDS[] = $row['ID'];
  $timeArr[] = $row['set_hours'];

}

$eventsEncode = json_encode($arrEvents);

$response = array('events' => $arrEvents, 'ids' => $arrIDS, 'time' => $timeArr);

echo json_encode($response);



?>