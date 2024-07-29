<?php 


require "../database/db-conn.php";


$dataContent = json_decode(file_get_contents('php://input'), true);


$englishHidden = $dataContent['englishHidden'];
$englishInput = $dataContent['englishInput'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {


 if ($englishHidden === "english") {

    if(empty($englishInput)) {

      echo json_encode(array("status" => 'emptyEnglish'));


    } else {
      $sqlEnglish = "UPDATE courses SET available_hours = CONCAT (available_hours, '$englishInput, ') WHERE name_subject = 'english'";
      $queryEnglish = mysqli_query($conn, $sqlEnglish);

      if($queryEnglish) {
        echo json_encode(array("status" => 'englishSuccess'));
      }

    }



  }

}









?>