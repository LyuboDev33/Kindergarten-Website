<?php

require "../database/db-conn.php";


$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];

$sql = "DELETE FROM event_dashboard WHERE ID = '$id'";
$query = mysqli_query($conn, $sql);

if($query) {
  echo json_encode(array('status' => 'successDel'));
}


