<?php require "../database/db-conn.php"; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/CSS Dashboard/dashboard.css">
  <link rel="stylesheet" href="/CSS Dashboard/adjust-events.css">
  <link rel="stylesheet" href="/CSS Dashboard/schedule.css">

  <title>Събития</title>

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


          <h1 class="create-Event">Създай събитие</h1>

        <div class="eventFlex">

          <form class="eventForm" method="post">

            <label for="nameEvent">Име на събитие</label>
            <input id="nameEvent" placeholder="Напишете име на събитие" type="text">

            <label for="hourEvent">Въведете час и дата</label>
            <input id="hourEvent" placeholder="Напишете час на събитието" type="text">


            <button class="createEventBTN" type="submit">Създай</button>

            <p id="reportMessage"></p>

          </form>

          <div class="uploadDiv">

            <form class="choosePic" method="POST" enctype="multipart/form-data">
              <label for="fileInput" class="custom-file-upload">
                <input id="fileInput" name="uploadImage" class="imgUpload" type="file">
                Избери снимка за голям екран
              </label>

              <button class="uploadBtn" type="submit" name="uploadBtn">Прикачи</button>
            </form>

            </div>

            <div class="uploadDiv">

            <form class="choosePic" method="POST" enctype="multipart/form-data">
              <label for="smallScreenImg" class="custom-file-upload">
                <input id="smallScreenImg" name="smallScreenImg" class="imgUpload" type="file">
                Избери снимка за малък екран
              </label>

              <button class="uploadBtn" type="submit" name="uploadSmall">Прикачи</button>
            </form>

            </div>

        </div>

            <?php

            require "../database/db-conn.php";

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              if (isset($_POST['uploadBtn'])) {

                $img = addslashes(file_get_contents($_FILES['uploadImage']['tmp_name']));
                $sql = "UPDATE imagefile SET image_file = '$img' WHERE id = 1";
                $query = mysqli_query($conn, $sql);
              }

              if(isset($_POST['uploadSmall'])) { 

                $imgSmall =  addslashes(file_get_contents($_FILES['smallScreenImg']['tmp_name']));
                $sqlSmall = "UPDATE imagefile SET image_file = '$imgSmall' WHERE id = 2";
                $querySmall = mysqli_query($conn, $sqlSmall);
              }
            }

            ?>



            <hr style="margin: 20px auto;">


            <div class="display-Events">

              <?php

              require "../database/db-conn.php";

              $sql = "SELECT * FROM event_dashboard";
              $query = mysqli_query($conn, $sql);

              while ($row = mysqli_fetch_assoc($query)) {


                echo " 
            <div class='containerEvent'>
            <form method='POST'>
            <label for='eventName'>Име на събитие:</label>
            <p><u>$row[event_name]</u></p>
            
            <label for='eventName'>Час на събитието:</label>
            <p><u>$row[set_hours]</u></p>

            <button class='removeBtn'>Премахни събитие</button>
            </form>
            <input class='hiddenTab'  value='" . $row['ID'] . "' type='hidden'>

          </div>";
              }

              ?>

            </div>


            <div class="modal-Background">
              <div class="inside-Background">
                <p></p>
                <form class="submitForm" method="post">
                  <button class="delBtn">Изтрии</button>
                  <button class="closeBtn">Затвори</button>
                </form>
              </div>
            </div>


            <hr style="margin-bottom:20px">

            <h1 class="listHeader">Списък със записани за събитие</h1>


            <div class="divPeople">
              <div class="total-box">
                <i class="uil uil-search"></i>
                <input class="inputEvent" name="workshop" type="text" placeholder="Филтрирай по име на събитие..." />
                <button id="findEvent" class="search-btn">Търси</button>
              </div>

              <p class="numbPeople"></p>

            </div>

            <div class="peopleContainer">


              <?php

              require "../database/db-conn.php";


              $sqlGET = "SELECT * FROM events";
              $queryGET = mysqli_query($conn, $sqlGET);

              while ($rowGet = mysqli_fetch_assoc($queryGET)) {

                echo " 
            <div class='eventsPeople'>
           
            <p>$rowGet[name_of_event]</p>
            <p>Час: $rowGet[hour_events] </p>
            <p>Име: $rowGet[names_events]</p>
            <p>Брой деца: $rowGet[kids_events] </p>
            <p>Имайл: $rowGet[email_events] </p>
            <p>Телефон: $rowGet[telephone_events]</p>
            </div>";
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

              <button class="delEventUsers" type="submit">Изтрии дати</button>

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



      <script>
        $(document).ready(function() {


          updateNumberPeople()

          function updateNumberPeople() {

            $('.numbPeople').empty();
            let numbPeople = $('.eventsPeople').length;
            $('.numbPeople').append(`Брой хора: ${numbPeople}`)
          }


          $('.delEventUsers').on('click', function() {

            $('.containerSimple').css('display', 'flex');
            $('.containerSimple button:first-child').css('display', 'inline-flex');
            $('.simple-modal').find('h1').text('Предупреждение');
            $('.simple-modal').find('p').text('Сигурни ли сте че искате да изтриете всички изтекли дати?');

            $('.containerSimple button:last-child').on('click', function(prev) {

              prev.preventDefault();

              $('.containerSimple').css('display', 'none');
            })

          })

          $('.containerSimple button:first-child').on('click', function(del) {

            del.preventDefault();


            $.ajax({

              type: 'POST',
              url: './deleteExpired.php',
              data: {
                deleteEvents: true
              },
              success: function(resp) {

                $('.containerSimple button:first-child').css('display', 'none');
                $('.simple-modal').find('h1').text('Успех!');
                $('.simple-modal').find('p').text('Всички предишни дати бяха изтрити');

              }

            })

          })




          $('#findEvent').on('click', function() {


            let eventData = {

              inputEvent: $('.inputEvent').val()

            }

            $.ajax({
              type: "POST",
              url: "../ajaxDashboard/seachAdjust-Events.php",
              contentType: "application/json",
              data: JSON.stringify(eventData),
              success: function(foundMatch, a, d) {

                $('.inputEvent').val('');

                let parsedMatch = JSON.parse(d.responseText);

                $('.peopleContainer').empty()

                for (let j = 0; j < parsedMatch.status.length; j++) {


                  $('.peopleContainer').append(`
                <div class='eventsPeople'>
                  <p> ${parsedMatch.status[j].event_name}</p>
                  <p>Час: ${parsedMatch.status[j].hour_events} </p>
                  <p>Име: ${parsedMatch.status[j].names_events}</p>
                  <p>Брой деца: ${parsedMatch.status[j].kids_events}</p>
                  <p>Имейл: ${parsedMatch.status[j].email_events}</p>
                  <p>Телефон: ${parsedMatch.status[j].telephone_events}</p>
                  </div>`)

                }

                updateNumberPeople();
              }
            })

          })



          $('.containerEvent').on('click', '.removeBtn', function(event) {
            event.preventDefault();

            $('.total-box').hide();
            $('.delBtn').css('display', 'flex');


            $('.inside-Background p').text('Сигурни ли сте че искате да изтриете събитието?');
            $('.modal-Background').css('display', 'flex');

            let inputVal = {
              hiddenId: $(this).closest('.containerEvent').find('.hiddenTab').val()
            }

            $('.delBtn').on('click', function(j) {

              j.preventDefault();

              $.ajax({
                type: 'POST',
                url: "../ajaxDashboard/deleteEvent.php",
                data: JSON.stringify({
                  id: inputVal.hiddenId
                }),
                success: function(response) {

                  let parsedData = JSON.parse(response)

                  if (parsedData.status === "successDel") {

                    $('.inside-Background p').text('Събитието беше изтрито успешно! Моля рефрешнете страницата!');
                    $('.delBtn').css('display', 'none');
                  }

                },

              });
            });
          });


          $('.closeBtn').click(function(ev) {

            ev.preventDefault();

            $('.total-box').show();
            $('.modal-Background').css('display', 'none');


          });


          $('.createEventBTN').on('click', function(e) {

            e.preventDefault();

            let eventParam = {

              nameEvent: $('#nameEvent').val(),
              hourEvent: $('#hourEvent').val()

            }

            $.ajax({

              type: "POST",
              url: "../ajaxDashboard/addEvent.php",
              contentType: "application/json",
              data: JSON.stringify(eventParam),
              success: function(resp) {

                let parsedMessage = JSON.parse(resp);

                if (parsedMessage.status === "emptyFail") {

                  emptyVal();
                  $('#reportMessage').text('Всички полета са задължителни!');
                  $('#reportMessage').css('color', 'red');
                  setTimeout(function() {

                    $('#reportMessage').empty();

                  }, 5000);

                } else {

                  emptyVal();

                  $('#reportMessage').text('Събитието беше създадено успешно!');
                  $('#reportMessage').css('color', 'green');


                  setTimeout(function() {

                    $('#reportMessage').empty();

                  }, 5000);


                }


                function emptyVal() {
                  $('#nameEvent').val('');
                  $('#hourEvent').val('');
                }




              }

            })

          })


        });
      </script>

      <script src="/js/sidebar.js"></script>


</body>

</html>