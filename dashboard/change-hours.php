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
  <link rel="stylesheet" href="/CSS Dashboard/change-hours.css">
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

          <h1 style="text-align: center;">Задаване на свободни часове</h1>

          <!-- BETWEEN FORMS -->


          <div class="form-container">
            <form class="form-changeHours" method="post">
              <h1 class="workshopHeader">Работилница <br> "Сръчни ръчички"</h1>

              <label for="workshopInput">Добави дата и час:</label>
              <input id="workshopInput" name="workshop" type="text">

              <div class="addRemoveHours">
                <button class="addWorkshop" type="submit">Добави</button>
                <input id="hiddenWorkshop" type="hidden" value="workshop">

                <button class="removeBTN" name="removeWorkshop" type="submit">Премахни часовете</button>
              </div>

              <div class="insideP">

              </div>

            </form>

            <!-- BETWEEN FORMS -->

            <form class="form-changeHours" method="post">
              <h1 class="workshopHeader">Английски език</h1>

              <label for="englishInput">Добави дата и час:</label>
              <input id="englishInput" name="englishInput" type="text">

              <div class="addRemoveHours">
                <button class="addEnglish" type="submit">Добави</button>
                <input id="hiddenEnglish" type="hidden" value="english">

                <button class="removeBTNenglish" name="removeEnglish" type="submit">Премахни часовете</button>
              </div>

              <div class="englishP ">

              </div>

            </form>

            <!-- BETWEEN FORMS -->


            <form class="form-changeHours" method="post">
              <h1 class="workshopHeader">Музика</h1>

              <label for="musicInput">Добави дата и час:</label>
              <input id="musicInput" name="musicInput" type="text">

              <div class="addRemoveHours">
                <button class="addMusic" type="submit">Добави</button>
                <input id="hiddenMusic" type="hidden" value="music">

                <button class="removeBtnMusic" name="removeMusic" type="submit">Премахни часовете</button>
              </div>

              <div class="musicP ">

              </div>

            </form>


            <!-- BETWEEN FORMS -->


            <form class="form-changeHours" method="post">
              <h1 class="workshopHeader">Йога практика "Мама и аз"</h1>

              <label for="momYogaInput">Добави дата и час:</label>
              <input id="momYogaInput" name="momYogaInput" type="text">

              <div class="addRemoveHours">
                <button class="addMomYoga" type="submit">Добави</button>
                <input id="hiddenAddMomYoga" type="hidden" value="momYoga">

                <button class="removeBtnMomYoga" name="removeBtnMomYoga" type="submit">Премахни часовете</button>
              </div>

              <div class="momYogaP ">

              </div>

            </form>


            <!-- BETWEEN FORMS -->


            <form class="form-changeHours" method="post">
              <h1 class="workshopHeader">Йога практика "Мама и аз"</h1>

              <label for="danceYogaInput">Добави дата и час:</label>
              <input id="danceYogaInput" name="danceYogaInput" type="text">

              <div class="addRemoveHours">
                <button class="addDanceYoga" type="submit">Добави</button>
                <input id="hiddenDanceYoga" type="hidden" value="dancing_yoga">

                <button class="removeBtnDanceYoga" name="removeBtnDanceYoga" type="submit">Премахни часовете</button>
              </div>

              <div class="danceYogaP ">

              </div>

            </form>

            <!-- BETWEEN FORMS -->



            <div class="background-modal">
              <div class="modal-box">
                <h1>Предупреждение</h1>
                <p>Сигурни ли сте че искате да изтриете всички часове под тази секция?</p>

                <div class="div-withBTNS">


                  <button class="closeModalBox">Затвори</button>
                </div>

              </div>
            </div>

            <script>
              $(document).ready(function() {

                let modalBox = $('.modal-box');

                // LOGIC FOR REMOVING THE MODAL

                function vals(header, pText) {
                  modalBox.find('h1').text(header);
                  modalBox.find('p').text(pText);
                  $('.deleteInfo').show();
                  $('.div-withBTNS').css('justify-content', 'space-evenly');
                }

                // LOGIC FOR REMOVING THE MODAL

                //START AJAX for adding workshop 

                $('.addWorkshop').on('click', function(w) {

                  w.preventDefault();


                  let dataWorkshop = {

                    workshopHidden: $('#hiddenWorkshop').val(),
                    workshopInput: $('#workshopInput').val(),

                  }

                  $.ajax({

                    type: 'POST',
                    url: '/ajaxDashboard/addWorkshop.php',
                    contentType: 'application/json',
                    data: JSON.stringify(dataWorkshop),
                    success: function(respWorkshop, a, b) {

                      let parsedWorkshop = JSON.parse(b.responseText);


                      if (parsedWorkshop.status === 'emptyWorkshop') {

                        $('.insideP').append('<p style="color: red" class="workP">Полето е задъжлително</p>');


                        setTimeout(function() {

                          $('.workP').remove();

                        }, 5000);

                      } else if (parsedWorkshop.status === 'workshopSuccess') {

                        $('#workshopInput').val('');
                        $('.insideP').empty();
                        $('.insideP').append('<p style="color: green" class="workP">Успешно записахте час!</p>');


                        setTimeout(function() {

                          $('.workP').remove();


                        }, 5000);

                      }

                    }

                  })

                })

                $('.removeBTN').on('click', function(e) {

                  e.preventDefault();

                  displayModal();

                  vals();


                  $('.div-withBTNS').find('form').remove();
                  $('.div-withBTNS').append(`<form method="post">
                  <button type="submit" value="deleteWork" class="deleteInfo">Изтрии</button>
                  </form>`);

                  $('.deleteInfo').on('click', function(deleteWork) {

                    deleteWork.preventDefault()



                    $.ajax({
                      type: "POST",
                      url: '/ajaxDashboard/removeHours.php',
                      data: {
                        deleteWorkshop: true
                      },
                      success: function(response) {

                        let parsedDelete = JSON.parse(response);


                        if (parsedDelete.status === "deleteWork") {

                          modalBox.find('h1').empty();
                          modalBox.find('p').empty();


                          vals("Успех", "Вие успешно успяхте да изтриете часовете в Работилница 'Сръчни ръчички'");
                          $('.deleteInfo').hide();
                          $('.div-withBTNS').css('justify-content', 'center');

                        }

                      }

                    })

                  });

                });

                ///END AJAX for adding workshop 

                //START AJAX for adding English 

                $('.addEnglish').on('click', function(l) {

                  l.preventDefault();

                  let dataEnglish = {

                    englishHidden: $('#hiddenEnglish').val(),
                    englishInput: $('#englishInput').val()

                  }


                  $.ajax({

                    type: 'POST',
                    url: '/ajaxDashboard/addEnglish.php',
                    contentType: 'application/json',
                    data: JSON.stringify(dataEnglish),
                    success: function(respEnglish, c, d) {

                      let parsedEnglish = JSON.parse(d.responseText);

                      if (parsedEnglish.status === 'emptyEnglish') {

                        $('.englishP').append('<p style="color: red" class="workP">Полето е задъжлително</p>');

                        setTimeout(function() {

                          $('.workP').remove();

                        }, 5000);

                      } else if (parsedEnglish.status === 'englishSuccess') {

                        $('#englishInput').val('');
                        $('.englishP').empty();
                        $('.englishP').append('<p style="color: green" class="workP">Успешно записахте час!</p>');


                        setTimeout(function() {

                          $('.workP').remove();


                        }, 5000);


                      }

                    }

                  })

                })

                //END AJAX for adding English 

                //start for removing English

                $('.removeBTNenglish').on('click', function(prevEnglish) {

                  prevEnglish.preventDefault();

                  displayModal();

                  vals();

                  $('.div-withBTNS').find('form').remove();
                  $('.div-withBTNS').append(`<form method="post">
                    <button type="submit" value="deleteEnglish" class="deleteEnglish">Изтрии</button>
                    </form>`);

                  $('.deleteEnglish').on('click', function(def) {

                    def.preventDefault();


                    $.ajax({
                      type: "POST",
                      url: '/ajaxDashboard/removeHours.php',
                      data: {
                        deleteEnglish: true
                      },
                      success: function(delEnglish, g, q) {

                        let englishParse = JSON.parse(q.responseText);


                        if (englishParse.status === "deleteEnglish") {


                          modalBox.find('h1').empty();
                          modalBox.find('p').empty();


                          $('.delEnglish').hide();
                          $('.div-withBTNS').css('justify-content', 'center');


                          vals("Успех", "Вие успешно успяхте да изтриете часовете в Английски");
                          $('.deleteEnglish').hide();
                          $('.div-withBTNS').css('justify-content', 'center');

                        }

                      }


                    })

                  })


                })

                //End for removing English

                //START modal for adding music 

                $('.addMusic').on('click', function(preMusic) {

                  preMusic.preventDefault();

                  let dataMusic = {

                    musicHidden: $('#hiddenMusic').val(),
                    musicInput: $('#musicInput').val()

                  }


                  $.ajax({

                    type: 'POST',
                    url: '/ajaxDashboard/addMusic.php',
                    contentType: 'application/json',
                    data: JSON.stringify(dataMusic),
                    success: function(respEnglish, k, y) {

                      let parsedMusic = JSON.parse(y.responseText);

                      if (parsedMusic.status === 'emptyMusic') {

                        $('.musicP').append('<p style="color: red" class="workP">Полето е задъжлително</p>');

                        setTimeout(function() {

                          $('.workP').remove();

                        }, 5000);

                      } else if (parsedMusic.status === 'musicSuccess') {

                        $('#musicInput').val('');
                        $('.musicP').empty();
                        $('.musicP').append('<p style="color: green" class="workP">Успешно записахте час!</p>');


                        setTimeout(function() {

                          $('.workP').remove();


                        }, 5000);


                      }

                    }

                  })

                })


                //End modal for adding music


                //Start of removing music data


                $('.removeBtnMusic').on('click', function(prevMusic) {

                  prevMusic.preventDefault();

                  displayModal();

                  vals();

                  $('.div-withBTNS').find('form').remove();
                  $('.div-withBTNS').append(`<form method="post">
                  <button type="submit" value="deleteMusic" class="deleteMusic">Изтрии</button>
                     </form>`);

                  $('.deleteMusic').on('click', function(defMusic) {

                    defMusic.preventDefault();


                    $.ajax({
                      type: "POST",
                      url: '/ajaxDashboard/removeHours.php',
                      data: {
                        deleteMusic: true
                      },
                      success: function(delMusic, index, musicText) {

                        let musicParse = JSON.parse(musicText.responseText);


                        if (musicParse.status === "deleteMusic") {


                          modalBox.find('h1').empty();
                          modalBox.find('p').empty();


                          vals("Успех", "Вие успешно успяхте да изтриете часовете в Музика");
                          $('.deleteMusic').hide();
                          $('.div-withBTNS').css('justify-content', 'center');

                        }

                      }

                    })

                  })


                })


                //End of removing music data

                // start for adding momYoga

                $('.addMomYoga').on('click', function(preMom) {

                  preMom.preventDefault();

                  let dataMomYoga = {

                    hiddenMomYoga: $('#hiddenAddMomYoga').val(),
                    inputMomYoga: $('#momYogaInput').val()

                  }

                  $.ajax({

                    type: 'POST',
                    url: '/ajaxDashboard/addMomYoga.php',
                    contentType: 'application/json',
                    data: JSON.stringify(dataMomYoga),
                    success: function(respMomYoga, indexMom, textMom) {

                      let parsedMom = JSON.parse(textMom.responseText);


                      if (parsedMom.status === 'emptyMomYoga') {

                        $('.momYogaP').append('<p style="color: red" class="workP">Полето е задъжлително</p>');

                        setTimeout(function() {

                          $('.workP').remove();

                        }, 5000);

                      } else if (parsedMom.status === 'momSuccess') {

                        $('.momYogaP').empty();
                        $('.momYogaP').append('<p style="color: green" class="workP">Успешно записахте час!</p>');
                        $('#momYogaInput').val('');


                        setTimeout(function() {

                          $('.workP').remove();


                        }, 5000);


                      }

                    }

                  })

                })

                // end for adding momYoga

                //start of removing momYoga hours



                $('.removeBtnMomYoga').on('click', function(q) {

                  q.preventDefault();

                  displayModal();

                  vals();

                  $('.div-withBTNS').find('form').remove();
                  $('.div-withBTNS').append(`<form method="post">
                   <button type="submit" value="deleteMomYoga" class="deleteMomYoga">Изтрии</button>
                  </form>`);

                  $('.deleteMomYoga').on('click', function(defMom) {

                    defMom.preventDefault();


                    $.ajax({
                      type: "POST",
                      url: '/ajaxDashboard/removeHours.php',
                      data: {
                        deleteMomYoga: true
                      },
                      success: function(delMom, indexDelMom, respDelMom) {

                        let delMomYoga = JSON.parse(respDelMom.responseText);


                        if (delMomYoga.status === "deleteMoYoga") {


                          modalBox.find('h1').empty();
                          modalBox.find('p').empty();


                          vals("Успех", "Вие успешно успяхте да изтриете часовете в Йога практика 'Мама и аз'");
                          $('.deleteMomYoga').hide();
                          $('.div-withBTNS').css('justify-content', 'center');

                        }

                      }

                    })

                  })


                });

                //end of removing momYoga hours


                // start for adding Dancing Yoga

                $('.addDanceYoga').on('click', function(z) {

                  z.preventDefault();

                  let danceYoga = {

                    hiddenDanceYoga: $('#hiddenDanceYoga').val(),
                    inputDanceYoga: $('#danceYogaInput').val()

                  }

                  $.ajax({

                    type: 'POST',
                    url: '/ajaxDashboard/addDancingYoga.php',
                    contentType: 'application/json',
                    data: JSON.stringify(danceYoga),
                    success: function(res, ind, txtDance) {

                      let parsedDance = JSON.parse(txtDance.responseText);


                      if (parsedDance.status === 'emptyDance') {

                        $('.danceYogaP').append('<p style="color: red" class="workP">Полето е задъжлително</p>');

                        setTimeout(function() {

                          $('.workP').remove();

                        }, 5000);

                      } else if (parsedDance.status === 'danceSuccess') {

                        $('.danceYogaP').empty();
                        $('.danceYogaP').append('<p style="color: green" class="workP">Успешно записахте час!</p>');
                        $('#danceYogaInput').val('');


                        setTimeout(function() {

                          $('.workP').remove();


                        }, 5000);


                      }

                    }

                  })

                })

                // end for adding Dancing Yoga

                //start for removing Dancing yoga 


                $('.removeBtnDanceYoga').on('click', function(x) {

                  x.preventDefault();

                  displayModal();

                  vals();

                  $('.div-withBTNS').find('form').remove();
                  $('.div-withBTNS').append(`<form method="post">
                      <button type="submit" value="deleteDanceYoga" class="deleteDanceYoga">Изтрии</button>
                          </form>`);

                  $('.deleteDanceYoga').on('click', function(a) {

                    a.preventDefault();


                    $.ajax({
                      type: "POST",
                      url: '/ajaxDashboard/removeHours.php',
                      data: {
                        deleteDance: true
                      },
                      success: function(respDance, indexDance, txtDance) {

                        let delDance = JSON.parse(txtDance.responseText);


                        if (delDance.status === "deleteDanceYoga") {


                          modalBox.find('h1').empty();
                          modalBox.find('p').empty();


                          vals("Успех", "Вие успешно успяхте да изтриете часовете в Танцуваща йога");
                          $('.deleteDanceYoga').hide();
                          $('.div-withBTNS').css('justify-content', 'center');

                        }

                      }

                    })

                  })


                });



                // end for removing dating yoga




                $('.closeModalBox').on('click', function() {

                  removeModal();

                  modalBox.find('h1').empty();
                  modalBox.find('p').empty();

                  modalBox.find('h1').append(`Предупреждение`);
                  modalBox.find('p').append('Сигурни ли сте че искате да изтриете всички часове под тази секция?');



                })

                function displayModal() {
                  $('.background-modal').css('display', 'flex');
                  $('.modal-box').css('display', 'block');

                }

                function removeModal() {

                  $('.modal-box').hide();
                  $('.background-modal').hide();

                }

              })
            </script>





            <!-- SIDEBAR LOGIC -->

            <script src="/js/sidebar.js"></script>

            <!-- SIDEBAR LOGIC -->

</body>

</html>