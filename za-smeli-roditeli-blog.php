<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tiny.cloud/1/w6dtnpvmug8uz5k6zc264wqti6jloshweic1g7dk5wpfv54k/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="icon" type="image/x-icon" href="/images/Logo1.png">
  <link rel="stylesheet" href="/css/blog-main-page.css">
  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="./css/header.css">
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/sign-up.css">
  <title>За смели родители</title>
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

<body>


  <div class="inlineDisplay">
    <div class="topHead yellow">
      <a href="./home-page">
        <p>Начало</p>
      </a>
    </div>

    <div class="headeraPart">

      <div class="firstDiv">
        <a href="./detska-yasla"><button class="menuBTNS yellow">Детска ясла</button> </a>
        <a id="switchOne" href="./za-smeli-roditeli-blog"><button style="text-decoration: underline; color: #ead652" class="menuBTNS yellow">За смели родители</button></a>
      </div>

      <div class="secondDiv">
        <a id="switchTwo" href="./ucheben-centur"><button class="menuBTNS yellow">Учебен център</button></a>
        <a href="./ani-i-dani-kniga"><button class="menuBTNS yellow">За малки приключенци</button></a>
      </div>


    </div>

  </div>

  <!-- JS CODE TO SWITCH THE LINKS -->

  <script src="./js/switchMenus.js"></script>

  <!-- JS CODE TO SWITCH THE LINKS -->



  <img class="svgHead" src="./images/5(5).jpg">

  <!-- <img class="svgHead" src="./images/Screenshot_5.jpg"> -->
  <img class="main-page" src="./images/mobile5.jpg" alt="">


  <div class="welcome-signUp">

    <p style="color: #ffe543;" class="welcome-par">Приключенията разказани!</p>

    <p class="text-par first">
      В това виртуално кътче споделяме истории и търсим отговори на онези
      въпроси пред които стръмната пътечка на родителството ни изправя ежедневно.
      <br class='displayBr'> <br class='displayBr'>
      Това пространство е за вас – супергероите, които създават бъдещето чрез грижата за своите деца.

    </p>

  </div>


  <div class="kidos-div">

    <div class="div-One">

      <a title="Статии семейство" class="kids-menus-forest-div" href="./za-smeli-roditeli-blog/zdrave">
        <div>
          <div class="round-div">
            <img class="inside-image greenForest" src="./images/healthBlog-removebg-preview.png">
          </div>
          <p class="text-subtitle">Здраве</p>
        </div>
      </a>

      <a title="Статии здраве" class="kids-menus-textbook" href="./za-smeli-roditeli-blog/semeistvo">
        <div>
          <div class="round-div">
            <img class="inside-image painting" src="./images/familyBlog-removebg-preview.png" alt="inside-img">
          </div>
          <p class="text-subtitle">Семейство</p>
        </div>
      </a>

    </div>

    <div class="div-Two">


      <a title="Статии развитие" class="kids-menus-paintingDiv" href="./za-smeli-roditeli-blog/razvitie">
        <div>
          <div class="round-div">
            <img class="inside-image painting" src="./images/developmentBlog-removebg-preview.png" alt="inside-img">
          </div>
          <p class="text-subtitle">Развитие</p>
        </div>
      </a>

      <a title="Емоции" href="./za-smeli-roditeli-blog/emocii" class="kids-menus purpleDiv">
        <div>
          <div class="round-div">
            <img class="inside-image purple-book" src="./images/emotionsBlog-removebg-preview.png" alt="inside-img">
          </div>
          <p class="text-subtitle">Емоции</p>
        </div>
      </a>

    </div>

  </div>



  <div class="container-with-articles">

    <?php

    require "./database/db-conn.php";



    $sql = "SELECT * FROM blog ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($query)) {

      echo "<div class='article-box blog'>

      
      <div>
        <img class='imgs-articleBox' src='./dashboard/$row[img]'>
      </div>

        <div class='headerPosition'>
      <h3 class='header-articles'>$row[header_article]</h3>

     
      </div>
 
      <div class='small-text-div'>
        <p class='small-text'>$row[sub_title]</p>
      </div>

      <div class='article-footer'>
    
        <p class='subject'>Категория: $row[article_category]</p>
          <a href='/dashboard/blog-files/$row[article_link]'><button class='button-link'>Научи повече</button></a>
       
      </div>
    </div>";
    }


    ?>

  </div>
  </div>


  <a href="./images/articleOne.png"></a>


  <?php require "./footer.php"; ?>

  <script>
    tinymce.init({
      selector: '#mainText',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>
</body>

</html>