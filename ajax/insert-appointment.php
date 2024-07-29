<?php

require "../database/db-conn.php";

mysqli_query($conn, 'SET foreign_key_checks = 0');

$dataContent = json_decode(file_get_contents('php://input'), true);


$appointment = $dataContent['pickedDate'];
$user_names = $dataContent['users_names'];
$number_kids = $dataContent['number_kids'];
$email_users = $dataContent['emailAddress'];
$telephone = $dataContent['telephone'];
$id = $dataContent['userID'];

$class_name = $dataContent['className'];
$class = "";

if ($class_name === "workshop") { 
    $class = "Работилница Сръчни ръчички";
} else if ($class_name === "english") { 
    $class = "Английски";
} else if ($class_name === "music") { 
    $class = "Музика за радостни щурчета";
} else if ($class_name === "momYoga") { 
    $class = "Йога практика 'Мама и аз'";
} else if ($class_name === 'dancing_yoga') { 
    $class = "Танцуваща йога";
}



if (empty($class_name) ||empty($appointment) || empty($user_names) || empty($number_kids) || empty($email_users) || empty($telephone) || empty($id)) {
    $response = array('status' => 'fail');
} else {

    $sql = "INSERT INTO course_users (course_id, chosen_date, chosen_class, users_names, number_kids, chosen_email, chosen_phone) 
            VALUES          ('$id', '$appointment', '$class', '$user_names', '$number_kids', '$email_users', '$telephone')";

    $query =  mysqli_query($conn, $sql);

    if ($query) {


        $to = $email_users;

        $from_name = "Детска Ясла Приключенци";
        $from_email = "contact@adventureland.bg";

        $headers = "From: $from_name " . "\r\n";
        $headers .= "Reply-To: $from_email" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $subject = "=?UTF-8?B?" . base64_encode("Записан час за $class") . "?=";

        $message = "
    <html>
    <head>
    </head>
    <body>
    <p> Здравейте, $user_names </p><br>
    <p> <b>Вие успешно запазихте вашият час по $class! </b> </p><br> 
    <p> Очакваме ви на $appointment часа в Учебен център „Приключенци“. Ще ни откриете на адрес ж.к. Изток, ул. „Тинтява “12А.</p><br>
    <p> Ако имате нужда от допълнителна информация, свържете се с нас на лично съобщение във Facebook или на телефон 0876 620 707.</p><br>
    <p> До скоро!</p><br>
  <p><b> Екипът на Учебен център „Приключенци“</b></p><br>
  <img style='width: 25%;' src='https://adventureland.bg/images/%D0%BF%D1%80%D0%B8%D0%BA%D0%BB%D1%8E%D1%87%D0%B5%D0%BD%D1%86%D0%B8-removebg-preview.png'><br>

  <a href='https://adventureland.bg/'>Adventureland.bg</a><br>

    </body>
    </html>";

        // THE EMAIL TO THE USER
        mail($to, $subject, $message, $headers);
        // THE EMAIL TO THE USER


        // THE EMAIL TO THE ADMIN PART

      
        $toAdmin = "contact@adventureland.bg";
        $headersAdmin = "From: $from_name " . "\r\n";
        $headersAdmin .= "MIME-Version: 1.0" . "\r\n";
        $headersAdmin .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $subjectAdmin = "=?UTF-8?B?" . base64_encode("Записан час по $class") . "?=";

        $messageAdmin = "
        <html>
        <head>
        </head>
        <body>
       <p> Нов потребител си записа час по $class </p><br>
       <p><b>Име на потребител: </b> $user_names </b></p><br> 
       <p><b>Дата и час на потребителя:<b> $appointment </b></p><br>
       <p><b>Телефонен номер на потребителя: <b> $telephone </b> </p><br>
       <p><b>Имейл адрес на потребителя: <b> $email_users </b> </p><br>

    

    
        </body>
        </html>";


        mail($toAdmin, $subjectAdmin, $messageAdmin, $headersAdmin);

    }


    mysqli_query($conn, 'SET foreign_key_checks = 1');

    $response = array('status' => 'success');
}

echo json_encode($response);
