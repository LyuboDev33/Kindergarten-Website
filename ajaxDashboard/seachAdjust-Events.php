<?php 


require "../database/db-conn.php";

$data = json_decode(file_get_contents('php://input'), true);


$inputVal = $data['inputEvent'];
$sql = "SELECT * FROM events WHERE name_of_event LIKE '%$inputVal%'";
$query = mysqli_query($conn, $sql);

$arrRes = array();

if ($query) {

  while ($row = mysqli_fetch_assoc($query)) {

    $arrRes[] = array(
      'event_name' => $row['name_of_event'],
      'hour_events' => $row['hour_events'],
      'names_events' => $row['names_events'],
      'kids_events' => $row['kids_events'],
      'email_events' => $row['email_events'],
      'telephone_events' => $row['telephone_events'],
     
    );
  }

 echo json_encode(array('status' => $arrRes));
}
