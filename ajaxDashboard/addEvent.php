<?php

require "../database/db-conn.php";


$dataContent = json_decode(file_get_contents('php://input'), true);

$nameEvent = $dataContent['nameEvent'];
$hourEvent = $dataContent['hourEvent'];


if (empty($nameEvent) && empty($hourEvent)) {

  $responseEmpty = json_encode(array('status'=>'emptyFail'));

  echo $responseEmpty;

} else {

  $sql = "INSERT INTO event_dashboard (event_name, set_hours) VALUES ('$nameEvent', '$hourEvent')";
  $query = mysqli_query($conn, $sql);


  if ($query) {

    $response = json_encode(array('status' => 'success'));

    echo $response;
  }

}
