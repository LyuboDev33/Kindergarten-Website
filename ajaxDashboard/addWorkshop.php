<?php 


require "../database/db-conn.php";


$dataContent = json_decode(file_get_contents('php://input'), true);



if ($_SERVER['REQUEST_METHOD'] === "POST") {

  $hiddenWorkshop = $dataContent['workshopHidden'];
  $workshopInput = $dataContent['workshopInput'];


  if ($hiddenWorkshop === "workshop") {

    if(empty($workshopInput)) {

      echo json_encode(array("status" => 'emptyWorkshop'));


    } else  { 

      $sql = "UPDATE courses SET available_hours = CONCAT(available_hours, '$workshopInput, ') WHERE name_subject = 'workshop'";
      $query = mysqli_query($conn, $sql);
  
      if($query) {
        echo json_encode(array("status" => 'workshopSuccess'));
      }
  
  

    }

 
  } 
  
  // else if($formType === "english") {

  //   $sqlEnglish = "UPDATE courses SET available_hours = CONCAT(available_hours, '$workshop, ') WHERE name_subject = 'english'";
  //   $queryEnglish = mysqli_query($conn, $sqlEnglish);

  //   if (isset($_POST['removeEnglish'])) {

  //     $sqlRemove = "UPDATE courses SET available_hours = '' WHERE name_subject = 'english'";
  //     $queryRemove = mysqli_query($conn, $sqlRemove);
  // }


  // }

}









?>