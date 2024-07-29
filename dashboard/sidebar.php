<?php 

session_start();

if($_SESSION['account'] !== 'admin'){
     header('Location: ./RegisterAndLogin/login-page.php');
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<div class="sidebar">
    <div class="logo-details">
      <img class="dashboard-logo" src="../images/приключенци-removebg-preview.png" alt="logo">
    </div>
    <ul class="nav-links">
      <li>
        <a class="signUp" href="./dashboard.php" >
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Записвания</span>
        </a>
      </li>
      <li>
        <a class="schedule" href="./schedule.php">
          <i class='bx bx-box'></i>
          <span class="links_name">График</span>
        </a>
      </li>
      <li>
        <a class="blog" href="./blog-dashboard-new.php">
          <i class='bx bx-list-ul'></i>
          <span class="links_name">Блог</span>
        </a>
      </li>

      <li>
        <a class="blog" href="./adjust-events.php">
          <i class='bx bx-list-ul'></i>
          <span class="links_name">Създай събитие</span>
        </a>
      </li>


      <li>
        <a class="blog" href="./change-hours.php">
          <i class='bx bx-list-ul'></i>
          <span class="links_name">Свободни часове</span>
        </a>
      </li>
      <li>
        

      <li class="log_out">
        <a href="#">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Изход</span>
        </a>
      </li>
    </ul>
  </div>

  

  

</body>
</html>