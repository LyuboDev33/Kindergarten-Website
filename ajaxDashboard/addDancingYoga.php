<?php 


require "../database/db-conn.php";


$dataContent = json_decode(file_get_contents('php://input'), true);


$danceHidden = $dataContent['hiddenDanceYoga'];
$danceInput = $dataContent['inputDanceYoga'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {


 if ($danceHidden === "dancing_yoga") {

    if(empty($danceInput)) {

      echo json_encode(array("status" => 'emptyDance'));


    } else {

      $sqlDance = "UPDATE courses SET available_hours = CONCAT (available_hours, '$danceInput, ') WHERE name_subject = 'dancing_yoga'";
      $queryDance = mysqli_query($conn, $sqlDance);

      if($queryDance) {

        echo json_encode(array("status" => 'danceSuccess'));
      }

    }



  }

}









?>