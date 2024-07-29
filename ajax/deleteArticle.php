<?php

require "../database/db-conn.php";

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id']; // Change this line to correctly access the 'id' key from the JSON data

$sql = "DELETE FROM blog WHERE id = '$id'";
$query = mysqli_query($conn, $sql);


if ($query) {
  echo json_encode(array('status' => 'deleteSuccess'));
} else {
  echo json_encode(array('status' => 'error', 'message' => 'Failed to delete article'));
}

?>
