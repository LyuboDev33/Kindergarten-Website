<?php


require "../database/db-conn.php";


$data = file_get_contents("php://input");

$decodedData = json_decode($data, true);

$kidName = $decodedData['kidName'];
$birth_date = $decodedData['birth_date'];
$parent_name = $decodedData['parent_name'];
$email = $decodedData['email'];
$phone = $decodedData['phone'];
$message = $decodedData['message'];

if (empty($kidName) || empty($birth_date) || empty($parent_name) || empty($email) || empty($phone)) {


  $fail = array('fail' => 'notFound');
  echo json_encode($fail);
  return;

} else {
  $stmt = $conn->prepare("INSERT INTO signform (kid_name, birth_date, parent_name, email, phone_number, opinion) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssss", $kidName, $birth_date, $parent_name, $email, $phone, $message);
  $stmt->execute();

  
  if ($stmt) {
      $success = array('success' => 'UserFound');
  } 

  echo json_encode($success);
}