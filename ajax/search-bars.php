<?php 

require "../database/db-conn.php";


$data = file_get_contents("php://input");
$decode = json_decode($data, true);
$inputVal = $decode['inputValue'];

$sql = "SELECT * FROM course_users INNER JOIN courses ON courses.id = course_users.course_id 
        WHERE chosen_date LIKE '%$inputVal%'";

$query = mysqli_query($conn, $sql);

$results = array();
$resultsEnglish = array();
$resultMusic = array();
$resultMomYoga = array();
$dancingYoga = array();

while ($row = mysqli_fetch_assoc($query)) {
    if ($row['name_subject'] === "workshop") {
        $results[] = array(
            'users_names' => $row['users_names'],
            'chosen_date' => $row['chosen_date'],
            'number_kids' => $row['number_kids'],
            'chosen_email' => $row['chosen_email'],
            'chosen_phone' => $row['chosen_phone'],
            'name_subject' => $row['name_subject']
        );
    } else if ($row['name_subject'] === "english") {

        $resultsEnglish[] = array(
            'users_names' => $row['users_names'],
            'chosen_date' => $row['chosen_date'],
            'number_kids' => $row['number_kids'],
            'chosen_email' => $row['chosen_email'],
            'chosen_phone' => $row['chosen_phone'],
            'name_subject' => $row['name_subject']
        );
    } else if($row['name_subject'] === "music") {
      $resultMusic[] = array(
        'users_names' => $row['users_names'],
        'chosen_date' => $row['chosen_date'],
        'number_kids' => $row['number_kids'],
        'chosen_email' => $row['chosen_email'],
        'chosen_phone' => $row['chosen_phone'],
        'name_subject' => $row['name_subject']
    );

    } else if($row['name_subject'] === "momYoga") {
      $resultMomYoga[] = array(
        'users_names' => $row['users_names'],
        'chosen_date' => $row['chosen_date'],
        'number_kids' => $row['number_kids'],
        'chosen_email' => $row['chosen_email'],
        'chosen_phone' => $row['chosen_phone'],
        'name_subject' => $row['name_subject']
    );

    }  else if($row['name_subject'] === "dancing_yoga") {
      
      $dancingYoga[] = array(
        'users_names' => $row['users_names'],
        'chosen_date' => $row['chosen_date'],
        'number_kids' => $row['number_kids'],
        'chosen_email' => $row['chosen_email'],
        'chosen_phone' => $row['chosen_phone'],
        'name_subject' => $row['name_subject']
    );

    } 
    
}


$combinedResults = array(
    'workshop' => $results,
    'english' => $resultsEnglish,
    'music' => $resultMusic,
    'momYoga' => $resultMomYoga,
    'danceYoga' => $dancingYoga
);

echo json_encode($combinedResults);









?>