

<?php

require "../database/db-conn.php";

mysqli_query($conn, 'SET foreign_key_checks = 0');

$dataEvent = json_decode(file_get_contents('php://input'), true);

$nameEvent = $dataEvent['nameEvent'];
$event = $dataEvent['selectEvent'];
$eventNames = $dataEvent['eventNames'];
$kidsEvent =  $dataEvent['kidsEvents'];
$eventEmail = $dataEvent['eventEmail'];
$eventPhone = $dataEvent['eventPhone'];


if (empty($event) || empty($eventNames) || empty($kidsEvent) || empty($eventEmail) || empty($eventPhone)) {
    $response = array('status' => 'emptyEventFields');
} else {

    $sql = "INSERT INTO events (name_of_event, hour_events, names_events, kids_events, email_events, telephone_events) 
                     VALUES ('$nameEvent','$event', '$eventNames', '$kidsEvent', '$eventEmail', '$eventPhone')";

    $query =  mysqli_query($conn, $sql);

    if ($query) {


        $to = $eventEmail;

        $from_name = "Детска Ясла Приключенци";
        $from_email = "contact@adventureland.bg";

        $headers = "From: $from_name " . "\r\n";
        $headers .= "Reply-To: $from_email" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $subject = "=?UTF-8?B?" . base64_encode("Записан час за събитие") . "?=";

        $message = "
    <html>
    <head>
    </head>
    <body>
    <p> Здравейте, $eventNames </p><br>
    <p> <b>Вие успешно запазихте своето място за $nameEvent! </b> </p><br> 
    <p> Очакваме ви на $event часа в Учебен център „Приключенци“. Ще ни откриете на адрес ж.к. Изток, ул. „Тинтява “12А.</p><br>
    <p> Ако имате нужда от допълнителна информация, свържете се с нас на лично съобщение във Facebook или на телефон 0876 620 707.</p><br>
    <p> До скоро!</p><br>
  <p><b> Екипът на Учебен център „Приключенци“</b></p><br>
  <img style='width: 25%;' src='https://adventureland.bg/images/%D0%BF%D1%80%D0%B8%D0%BA%D0%BB%D1%8E%D1%87%D0%B5%D0%BD%D1%86%D0%B8-removebg-preview.png'><br>

  <a href='https://adventureland.bg/'>Adventureland.bg</a><br>

    </body>
    </html>";

        // THE EMAIL TO THE USER
        mail($to, $subject, $message, $headers);

        //THE EMAIL TO THE ADMIN PART

        $toAdmin = "contact@adventureland.bg";
        $headersAdmin = "From: $from_name " . "\r\n";
        $headersAdmin .= "MIME-Version: 1.0" . "\r\n";
        $headersAdmin .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $subjectAdmin = "=?UTF-8?B?" . base64_encode("Записан час за събитие") . "?=";

        $messageAdmin = "
        <html>
        <head>
        </head>
        <body>
       <p> Нов потребител си записа час за $nameEvent </p><br>
       <p><b>Име на потребител: </b> $eventNames</p><br> 
       <p><b>Дата и час на потребителя:</b> $event</p><br>
       <p><b>Телефонен номер на потребителя: $eventPhone </b> </p><br>
       <p><b>Имейл адрес на потребителя: $eventEmail </b> </p><br>

    

    
        </body>
        </html>";


        mail($toAdmin, $subjectAdmin, $messageAdmin, $headersAdmin);





        mysqli_query($conn, 'SET foreign_key_checks = 1');

        $response = array('status' => 'successEventFields');
    }
}

echo json_encode($response);
