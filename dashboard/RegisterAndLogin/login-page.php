<!DOCTYPE html>
<html lang="en">
  <meta charset="UTF-8">

<head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="/CSS Dashboard/login-page.css">
  <title>Вход</title>
</head>

<body>
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>

  <form method="post">

    <div>
      <img class="logo-login" src="../../images/приключенци-removebg-preview.png" alt="logo-image">
    </div>

    <label for="loginEmail">Имейл:</label>
    <input type="text" placeholder="Въведете имейл" id="loginEmail" name="loginEmail">

    <label for="loginPass">Парола: </label>
    <input type="password" placeholder="Въведете парола" id="loginPass" name="loginPass">

    <button class="show-modal" id="login-btn">Вход</button>

  </form>


  <script>

    $(document).ready(function () {


      let loginBtn = $('#login-btn');


      loginBtn.on('click', function (event) {

        event.preventDefault();

        let dataInputs = {
          email: $('#loginEmail').val(),
          pass: $('#loginPass').val()
        }

        $.ajax({
          type: 'POST',
          url: "login-page-logic.php",
          contentType: "application/json",
          data: JSON.stringify(dataInputs),

          success: function (response, textStatus, j) {

            const resultLog = JSON.parse(j.responseText);

            if (resultLog.fail === "NotFound") {
              $('body').append(`
            <section>
              <span class="overlay"></span>
              <div class="modal-box">
                <i class="fa-regular fa-circle-check"></i>
                <h2>Грешно име или парола!</h2><br>
                <p>Опитайте отново :) </p>
                <div class="buttons">
                  <button class="close-btn">Затвори</button>
                </div>
              </div>
            </section>
          `);

              effects();

              return;

            } else if (resultLog.success === "UserFound") { 

              window.location.href = '../dashboard.php';

            }




            function effects() {
              const section = document.querySelector("section"),
                overlay = document.querySelector(".overlay"),
                closeBtn = document.querySelector(".close-btn");
              overlay.addEventListener("click", () => section.classList.remove("active"));
              closeBtn.addEventListener("click", () => section.classList.remove("active"));

              section.classList.add("active");
            }

          }


        });


      });


    });





  </script>


</body>

</html>