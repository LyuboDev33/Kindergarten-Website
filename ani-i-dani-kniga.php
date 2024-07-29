<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="/images/Logo1.png">
  <link rel="stylesheet" href="/css/footer.css">
  <link rel="stylesheet" href="/css/header.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/selling-book.css">
  <link rel="stylesheet" href="/css/sign-up.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <title>За малки приключенци</title>

  <!-- Meta Pixel Code -->
  <script>
    !function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '8138903319459079');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=8138903319459079&ev=PageView&noscript=1" /></noscript>
  <!-- End Meta Pixel Code -->
</head>

<body class="main-page-body">



  <div class="inlineDisplay">
    <div class="topHead purple">
      <a href="./home-page">
        <p>Начало</p>
      </a>
    </div>

    <div class="headeraPart">

      <div class="firstDiv">
        <a href="./detska-yasla"><button class="menuBTNS purple">Детска ясла</button> </a>
        <a id="switchOne" href="./za-smeli-roditeli-blog"><button class="menuBTNS purple">За смели родители</button></a>
      </div>

      <div class="secondDiv">
        <a id="switchTwo" href="./ucheben-centur"><button class="menuBTNS purple">Учебен център</button></a>
        <a href="./ani-i-dani-kniga"><button style="text-decoration: underline; color: #9a82be" class="menuBTNS purple">За малки приключенци</button></a>
      </div>
    </div>

  </div>

  <!-- JS CODE TO SWITCH THE LINKS -->

  <script src="./js/switchMenus.js"></script>

  <!-- JS CODE TO SWITCH THE LINKS -->





  <img class="svgHead indexPage" src="./images/4(4).jpg">
  <img class="main-page" src="./images/mobile4.png" alt="mobile-index">



  <div style="text-align: center;display: flex; flex-direction: column; align-items: center;" class="header-with-text">
    <p style="color: #9a82be" class="head-for-kids">Приключенията на <br class="kidsBR"> Ани и Дани</p>

    <p id="sellTextSoon">Историите на нашите герои са вдъхновени от откривателската същност и
      неподправеното любопитство на децата. <br class="kidsBR"><br class="kidsBR">
      В детската градина, на разходка в гората
      или с лодка в открито море - Ани и Дани винаги са готови за ново приключение!
    </p>
  </div>


  <main style="text-align: center;
    height: auto;
    min-height: 60vh;
    display: flex;">


    <div class="kidsWithText">

      <img class="anniDannyImg" src="./images/kidGirl.png" alt="Anni and Danny">
      <p>Здравейте, малки читатели!<br> <br>
        Вълнуваме се! Съвсем скоро ще държите нашата първа история в ръчичките си.
        Разлистете страниците – ние ще ви очакваме там!
      </p>
      <img class="anniDannyImg" src="./images/kidBoy (1).png" alt="Anni and Danny">


    </div>

  </main>




  </script>

  <?php include "./footer.php"; ?>


</body>

</html>