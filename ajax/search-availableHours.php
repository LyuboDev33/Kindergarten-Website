
<?php require "../database/db-conn.php";

$data = json_decode(file_get_contents('php://input'), true);

$category = $data['category'];

$sql = "SELECT * FROM courses WHERE name_subject = '$category '";
$query = mysqli_query($conn, $sql);

$resultArray = array();


while ($row = mysqli_fetch_assoc($query))  {


  $resultArray[] = array(
    'available_hours' => $row['available_hours'],
    'id' => $row['id'], 
);

$jsonEncodedResult = json_encode($resultArray);
header('Content-Type: application/json');
echo $jsonEncodedResult;

}







// $sql = "SELECT course_users.*, courses.name AS course_name
// FROM course_users
// JOIN courses ON course_users.course_id = courses.id";

// $query = mysqli_query($conn, $sql);

// while ($row = mysqli_fetch_assoc($query)) {
// echo $row['course_name'];
// }



?>