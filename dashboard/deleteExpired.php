<?php

require "../database/db-conn.php";


if ($_SERVER['REQUEST_METHOD'] === "POST") {

  if ($_POST['deleteData']) {

    $delete_query = "DELETE FROM course_users WHERE time_stamp < NOW() - INTERVAL 1 DAY";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {

      echo json_encode(array('status' => 'successDelete'));
      return;

    }
  } else if ($_POST['deleteEvents']) {


    $delete_queryEvent = "DELETE FROM events WHERE time_stp < NOW() - INTERVAL 1 DAY";
    $resultEvent = mysqli_query($conn, $delete_queryEvent);

    if ($resultEvent) {

      echo json_encode(array('status' => 'delEvents'));

    }

  }

}
