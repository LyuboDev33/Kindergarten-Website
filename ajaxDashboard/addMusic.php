<?php 


require "../database/db-conn.php";


$dataContent = json_decode(file_get_contents('php://input'), true);


$musicHidden = $dataContent['musicHidden'];
$musicInput = $dataContent['musicInput'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {


 if ($musicHidden === "music") {

    if(empty($musicInput)) {

      echo json_encode(array("status" => 'emptyMusic'));


    } else {
      $sqlMusic = "UPDATE courses SET available_hours = CONCAT (available_hours, '$musicInput, ') WHERE name_subject = 'music'";
      $queryMusic = mysqli_query($conn, $sqlMusic);

      if($queryMusic) {
        echo json_encode(array("status" => 'musicSuccess'));
      }

    }



  }

}









?>