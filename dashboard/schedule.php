<?php require "../database/db-conn.php"; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/CSS Dashboard/dashboard.css">
  <link rel="stylesheet" href="/CSS Dashboard/schedule.css">
  <title> График</title>

</head>

<body>

  <?php require "./sidebar.php";  ?>



  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Табло за управление</span>
      </div>
    </nav>
    <div class="home-content">

      <div class="sales-boxes">
        <div class="recent-sales box">

          <h1 style="text-align: center; margin-bottom: 30px;">График</h1>

          <div class="total-box">
            <i class="uil uil-search"></i>
            <input class="filter-workshop" name="workshop" type="text" placeholder="Филтрирай дата..." />
            <button class="search-btn">Търси</button>
          </div>


          <h1 class="header-classes">Работилница "Сръчни ръчички"</h1>

          <div class="workshop-class grided-box">

            <?php

            $sql = "SELECT * FROM course_users INNER JOIN courses ON courses.id = course_users.course_id ";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($query)) {
              $name_subject = $row['name_subject'];


              if ($name_subject === "workshop") {
                echo '
              <div class="inside-div">
              <p>Име: ' . $row['users_names'] . '</p>
              <p>Дата: ' . $row['chosen_date'] . '</p>
              <p>Брой деца: ' . $row['number_kids'] . '</p>
              <p>Имейл: ' . $row['chosen_email'] . '</p>
              <p>Телефон: ' . $row['chosen_phone'] . '</p>
              <p><b>Създадено на: </b>' . $row['time_stamp'] . '</p>
              </div>';
              };
            }
            ?>
          </div>

          <h1 class="header-classes">Английски</h1>


          <div class="english-class grided-box">

            <?php


            $sql = "SELECT * FROM course_users INNER JOIN courses ON courses.id = course_users.course_id ";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($query)) {
              $name_subject = $row['name_subject'];

              if ($name_subject === "english") {
                echo '
                <div class="inside-div">
                <p>Име: ' . $row['users_names'] . '</p>
                <p>Дата: ' . $row['chosen_date'] . '</p>
                <p>Брой деца: ' . $row['number_kids'] . '</p>
                <p>Имейл: ' . $row['chosen_email'] . '</p>
                <p>Телефон: ' . $row['chosen_phone'] . '</p>
                <p><b>Създадено на: </b>' . $row['time_stamp'] . '</p>
                </div>';
              };
            }

            ?>
          </div>

          <h1 class="header-classes">Музика за радостни щурчета</h1>


          <div class="music-class grided-box">

            <?php


            $sql = "SELECT * FROM course_users INNER JOIN courses ON courses.id = course_users.course_id ";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($query)) {
              $name_subject = $row['name_subject'];

              if ($name_subject === "music") {
                echo '
                <div class="inside-div">
                <p><b>Име: </b><span style ="font-size: 22px">' . $row['users_names'] . '</span></p>
                <p><b>Дата:</b> ' . $row['chosen_date'] . '</p>
                <p><b>Брой деца: </b>' . $row['number_kids'] . '</p>
                <p><b>Имейл: </b>' . $row['chosen_email'] . '</p>
                <p><b>Телефон: </b>' . $row['chosen_phone'] . '</p>
                <p><b>Създадено на: </b>' . $row['time_stamp'] . '</p>
                </div>';
              };
            }

            ?>
          </div>

          <h1 class="header-classes">Йога практика "Мама и аз"</h1>

          <div class="momYoga-class grided-box">

            <?php

            $sql = "SELECT * FROM course_users INNER JOIN courses ON courses.id = course_users.course_id ";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($query)) {
              $name_subject = $row['name_subject'];

              if ($name_subject === "momYoga") {
                echo '
                <div class="inside-div">
                <p><b>Име: </b><span style ="font-size: 22px">' . $row['users_names'] . '</span></p>
                <p><b>Дата:</b> ' . $row['chosen_date'] . '</p>
                <p><b>Брой деца: </b>' . $row['number_kids'] . '</p>
                <p><b>Имейл: </b>' . $row['chosen_email'] . '</p>
                <p><b>Телефон: </b>' . $row['chosen_phone'] . '</p>
                <p><b>Създадено на: </b>' . $row['time_stamp'] . '</p>
                </div>';
              };
            }

            ?>
          </div>


          <h1 class="header-classes">Танцуваща йога</h1>

          <div class="dancingYoga-class grided-box">


            <?php

            $sql = "SELECT * FROM course_users INNER JOIN courses ON courses.id = course_users.course_id ";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($query)) {

              $name_subject = $row['name_subject'];

              if ($name_subject === "dancing_yoga") {
                echo '
              <div class="inside-div">
              <p><b>Име: </b><span style ="font-size: 22px">' . $row['users_names'] . '</span></p>
              <p><b>Дата:</b> ' . $row['chosen_date'] . '</p>
              <p><b>Брой деца: </b>' . $row['number_kids'] . '</p>
              <p><b>Имейл: </b>' . $row['chosen_email'] . '</p>
              <p><b>Телефон: </b>' . $row['chosen_phone'] . '</p>
              <p><b>Създадено на: </b>' . $row['time_stamp'] . '</p>
              </div>';
              };
            }

            ?>
          </div>





          <hr>

          <h1 class="deleteDataH1">Изтрии предишните дати</h1>

          <p class="warning">С натискането на бутона "Изтрий дати"
            ще изтриете всички потребители от вече изтекла дата. <br><br>
            Пример:
            Ако днес е 2-ви февруари 2024г. и сте имали събитие на 1-ви февруари (предишния ден),
            с натискането на бутона "Изтрий", ще изтриете всички потребители, които са присъствали на събитието на 1-ви февруари. <br><br>

            В случай, че имате нужда от допълнителна информация, моля изгледайте видеото от линка <a target="_blank" href="https://youtu.be/csaag6M7Hpg">ТУК</a>
            (Видеото е дълго 4 минути :) 
          <div class="deleteDataForm" method="post">  

            <button class="deletePrevData" type="submit">Изтрии дати</button>

          </div>


          <div class="containerSimple">
            <div class="simple-modal">
              <h1></h1>
              <p></p>

              <form method="post" class="btnsModal">
                <button>Изтрии</button>
                <button>Затвори</button>
              </form>
            </div>
          </div>



        </div>



      </div>

    </div>

    </div>


  </section>


  <script>
    $(document).ready(function() {

      //code for popping the modal

      $('.deletePrevData').on('click', function(e) {

        e.preventDefault();

        $('.containerSimple').css('display', 'flex');
        $('.containerSimple button:first-child').css('display', 'inline-flex');
        $('.simple-modal').find('h1').text('Предупреждение');
        $('.simple-modal').find('p').text('Сигурни ли сте че искате да изтриете всички изтекли дати?');

        $('.containerSimple button:last-child').on('click', function(a) {

          a.preventDefault();

          $('.containerSimple').css('display', 'none');
        })

      })

      //end of code for popping the modal

      //code for deleting the info

      $('.containerSimple button:first-child').on('click', function(b) {

        b.preventDefault();

        $.ajax({ 

          type: 'POST',
          url: './deleteExpired.php',
          data: { 
            deleteData: true 
          },
          success: function(resp) {

            $('.containerSimple button:first-child').css('display', 'none');
            $('.simple-modal').find('h1').text('Успех!');
            $('.simple-modal').find('p').text('Всички предишни дати бяха изтрити');

          }

        })

      })

    //code for deleting the info

      let searchBTN = $('.search-btn');

      searchBTN.on('click', function(event) {
        event.preventDefault();

        let inputData = {
          inputValue: $('.filter-workshop').val(),
        }

        $.ajax({
          method: "POST",
          url: "../ajax/search-bars.php",
          contentType: "application/json",
          data: JSON.stringify(inputData),
          success: function(response, index, a) {
            let respData = JSON.parse(a.responseText);


            let resultWorkshop = respData.workshop;
            let resultEnglish = respData.english;
            let resultMusic = respData.music;
            let resultMomYoga = respData.momYoga;
            let resultDancingYoga = respData.danceYoga;

            appendResults($('.workshop-class'), resultWorkshop);
            appendResults($('.english-class'), resultEnglish);
            appendResults($('.music-class'), resultMusic);
            appendResults($('.momYoga-class'), resultMomYoga);
            appendResults($('.dancingYoga-class'), resultDancingYoga);
          }
        });
      });

      function appendResults($container, data) {
        $container.empty();

        if (data && data.length > 0) {
          for (let i = 0; i < data.length; i++) {
            let result = data[i];

            $container.append(`
                <div class="inside-div">
                    <p>Име: ${result.users_names}</p>
                    <p>Дата: ${result.chosen_date}</p>
                    <p>Брой деца: ${result.number_kids}</p>
                    <p>Имейл: ${result.chosen_email}</p>
                    <p>Телефон: ${result.chosen_phone}</p>
                </div>
            `);
          }
        } else {
          $container.append('<p>Няма намерени дати за този час.</p>');
        }
      }




      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else
          sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }

    });
  </script>
</body>

</html>