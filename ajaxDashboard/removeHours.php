<?php

require "../database/db-conn.php";


if (isset($_POST['deleteWorkshop']) ) {
     
  $sqlRemove = "UPDATE courses SET available_hours = '' WHERE name_subject = 'workshop'";
  $queryRemove = mysqli_query($conn, $sqlRemove);

  if ($queryRemove) {
      echo json_encode(array('status' => 'deleteWork'));
  } 
} 

if (isset($_POST['deleteEnglish'])) {
  
    $sqlRemoveEnglish = "UPDATE courses SET available_hours = '' WHERE name_subject = 'english'";
    $queryRemoveEnglish = mysqli_query($conn, $sqlRemoveEnglish);

    if($sqlRemoveEnglish) {
      echo json_encode(array('status' => 'deleteEnglish'));

    }

}

if (isset($_POST['deleteMusic'])) {
  
  $sqlRemoveMusic = "UPDATE courses SET available_hours = '' WHERE name_subject = 'music'";
  $queryMusic = mysqli_query($conn, $sqlRemoveMusic);

  if($queryMusic) {
    echo json_encode(array('status' => 'deleteMusic'));

  }

}

if (isset($_POST['deleteMomYoga'])) {
  
  $sqlRemoveMomYoga = "UPDATE courses SET available_hours = '' WHERE name_subject = 'momYoga'";
  $queryMomYoga = mysqli_query($conn, $sqlRemoveMomYoga);

  if($queryMomYoga) {
    echo json_encode(array('status' => 'deleteMoYoga'));

  }

}


if (isset($_POST['deleteDance'])) {
  
  $sqlRemoveDance = "UPDATE courses SET available_hours = '' WHERE name_subject = 'dancing_yoga'";
  $queryRemoveDance = mysqli_query($conn, $sqlRemoveDance);

  if($queryRemoveDance) {
    echo json_encode(array('status' => 'deleteDanceYoga'));

  }

}











?>