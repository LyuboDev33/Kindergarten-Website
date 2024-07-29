<?php

require "../../database/db-conn.php";

$dataLog = json_decode(file_get_contents('php://input'), true);

$inputMail = isset($dataLog['email']) ? $dataLog['email'] : null;
$inputPass = isset($dataLog['pass']) ? $dataLog['pass'] : null;

$sqlLog = 'SELECT * FROM admins';
$queryLog = mysqli_query($conn, $sqlLog);

$found = false;

while ($row = mysqli_fetch_assoc($queryLog)) {
    


    if ($row['email'] === $inputMail && $row['pass'] === hash('sha256', $inputPass)) {
      $found = true;
      
     session_start();
     $_SESSION['account'] = $row['account_type'];
    
        break;
    }
}

if ($found) {

  $foundName = array('success' => 'UserFound');
    echo json_encode($foundName);

  } else {

  $passError = array('fail' => 'NotFound');
    echo json_encode($passError);
}



?>
