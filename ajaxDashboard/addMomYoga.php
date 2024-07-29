<?php 


require "../database/db-conn.php";


$dataContent = json_decode(file_get_contents('php://input'), true);


$momHidden = $dataContent['hiddenMomYoga'];
$momInput = $dataContent['inputMomYoga'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {


 if ($momHidden === "momYoga") {

    if(empty($momInput)) {

      echo json_encode(array("status" => 'emptyMomYoga'));


    } else {

      $sqlMomYoga = "UPDATE courses SET available_hours = CONCAT (available_hours, '$momInput, ') WHERE name_subject = 'momYoga'";
      $queryMomYoga = mysqli_query($conn, $sqlMomYoga);

      if($queryMomYoga) {

        echo json_encode(array("status" => 'momSuccess'));
      }

    }



  }

}









?>