<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/CSS Dashboard/dashboard.css">
  <title> Профил</title>
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

          <h1 style="text-align: center;">Записване за градина</h1>

          <div class="div-withInfo">

            <?php

            require "../database/db-conn.php";


            $sql = "SELECT * FROM signform ORDER BY id DESC";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($query)) {


              echo "<div class='info-askings'>

           <label for='user-id'>ID на потребителя: </label>
           <input disabled value='$row[id]' type='text'>
 
           <label for='kid-name'>Име не детето:</label>
           <input disabled value='$row[kid_name]' type='text'>
 
           <label for='birthDate-kid'>Рожденна дата: </label>
           <input disabled value='$row[birth_date]' type='text'>
 
           <label for='parent-name'>Име на родител: </label>
           <input disabled value='$row[parent_name]' type='text'>
 
           <label for='parent-email'>Имейл: </label>
           <input value='$row[email]' disabled type='text'>
 
           <label for='user-phone'>Телефонен номер: </label>
           <input value='$row[phone_number]' disabled value='' type='text'>
         
           <label>Съобщение: </label>
           <textarea class='opinionGet' rows='5'>$row[opinion]</textarea>

 
           </div> ";
            }


            ?>


          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="/js/sidebar.js"></script>

</body>

</html>