<?php

require "../../database/db-conn.php";

$data = json_decode(file_get_contents('php://input'), true);

$emailReg = $data['email'];
$passReg = $data['password'];
$passRegRepeat = $data['passRepeat'];

if (empty($emailReg) || empty($passReg) || empty($passRegRepeat)) {
  $empty = array('error' => 'Всички полета са задължителни!');
  echo json_encode($empty);

  return;
} 

else if ($passReg !== $passRegRepeat) {
  $passError = array('error' => 'Паролите не съвпадат!');
  echo json_encode($passError);
  return; 
}

else {
  $sql = "INSERT INTO admins (email, pass) VALUES (?, ?)";
  $stmt = mysqli_prepare($conn, $sql);

  $pwdHash = hash('sha256', $passReg);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ss", $emailReg, $pwdHash);
    $queryResult = mysqli_stmt_execute($stmt);

    if ($queryResult) {
      $response = array('success' => "Успех");
    }

    mysqli_stmt_close($stmt);
  }
}

echo json_encode($response);
