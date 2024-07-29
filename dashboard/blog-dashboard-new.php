<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://cdn.tiny.cloud/1/w6dtnpvmug8uz5k6zc264wqti6jloshweic1g7dk5wpfv54k/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <link rel="stylesheet" href="/CSS Dashboard/blog.css">
  <link rel="stylesheet" href="/CSS Dashboard/dashboard.css">
  <title>Блог табло</title>
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

          <h1 style="text-align: center;">Блог</h1>

          <form class="create-article-form" id='articles-created' method="post" enctype="multipart/form-data">

            <div class="divOne">

              <div class="pic-and-label">
                <label class="choose-pic" for="pic-main-page">Избери снимка: </label>
                <input required class="format-label" id="pic-main-page" name="pic-main-page" type="file">
              </div>


              <label for="heading-onPage">Заглавие:</label>
              <input required class="format-label" id="heading-onPage" name="heading-onPage" type="text">

              <label for="subTitle">Текст подзаглавие: </label>
              <textarea required class="format-label" id="subTitle" name="subTitle" placeholder="Подзаглавие..."></textarea>

              <label for="link">Линк към статията:</label>
              <input required class="format-label" id="link" name="link" type="text">

              <label for="catergory">Категория</label>
              <select class="format-label" id="catergory" name="category">
                <option value="Семейство">Семейство</option>
                <option value="Емоции">Емоции</option>
                <option value="Развитие">Развитие</option>
                <option value="Здраве">Здраве</option>
              </select>
            </div>

            <div class="divTwo">
              <label style="text-decoration: underline; font-size: 20px;" for="mainText">Съдържание ГОЛЯМ екран</label><br><br>
              <textarea name="mainText" id="mainText"></textarea>

              <label style="text-decoration: underline; font-size: 20px;" for="mainSmall">Съдържание МАЛЪК екран</label><br><br>
              <textarea name="mainSmall" id="mainSmall"></textarea>

              <button type="submit" class="submitBtn" id="btnSubmit">Създай статия</button>

              <input value="submitInfo" type="hidden" name="formType">

            </div>

          </form>

          <hr><br>
          <hr><br>
          <hr><br>
          <hr>

          <p style="font-size: 40px; text-align: center; margin: 35px auto;">Статии</h>

          <div class="containerArticles">


          </div>


          <div class="backgroundBlog">
            <div class="delModal">
              <h1></h1>
              <p></p>
              <form class="formDel" method="post">
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


  <?php

  require "../database/db-conn.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $formType = $_POST['formType'];


    if ($formType === "submitInfo") {

      $return_link;

      $title = $_POST['heading-onPage'];
      $subTitle = $_POST['subTitle'];
      $link = $_POST['link'];
      if (!preg_match('/\.php$/', $link)) {
        $link .= '.php';
      }
      $category = $_POST['category'];

      if ($category === 'Семейство') {
        $return_link = '../../za-smeli-roditeli-blog/semeistvo';
      } else if ($category === 'Здраве') {

        $return_link = '../../za-smeli-roditeli-blog/zdrave';
      } else if ($category === 'Развитие') {

        $return_link = '../../za-smeli-roditeli-blog/razvitie';
      } else if ($category === 'Емоции') {

        $return_link = '../../za-smeli-roditeli-blog/emocii';
      }


      $content_display =  $_POST['mainText'];
      $content_phone = $_POST['mainSmall'];

      $target_dir = "blog-images/";
      $target_file = $target_dir . basename($_FILES["pic-main-page"]["name"]);
      move_uploaded_file($_FILES["pic-main-page"]["tmp_name"], $target_file);


      $sqlMaxID = "SELECT MAX(id) AS max_id FROM blog";
      $resultMaxID = mysqli_query($conn, $sqlMaxID);
      $rowMaxID = mysqli_fetch_assoc($resultMaxID);
      $max_id = $rowMaxID['max_id'];
      $next_id = $max_id + 1;


      $sqlCreate = "INSERT INTO blog (id, img, header_article, sub_title, article_link, article_category, content, content_display, return_link)
      VALUES ('$next_id', '$target_file', '$title', '$subTitle', '$link', '$category', '$content_phone', '$content_display', '$return_link')";
      $queryCreate = mysqli_query($conn, $sqlCreate);

      $directory = "./blog-files/";
      $fullPath = $directory . $link;


      $sql = "SELECT * FROM blog";
      $query = mysqli_query($conn, $sql);

      $i = 1;

      while ($row = mysqli_fetch_assoc($query)) {

        $content = '';

        $content .= "<!DOCTYPE html>";
        $content .= "<html lang=\"en\">";
        $content .= "<meta charset='UTF-8'>
                     <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        $content .= "<head>";
        $content .= "<script src='https://cdn.tiny.cloud/1/888o7m22n9qvu43oeop8rgfjphhlib69u7lmqrnzlnageh4e/tinymce/6/tinymce.min.js' referrerpolicy='origin'></script>
                    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'>
                    <link rel='icon' type='image/x-icon' href='/images/Logo1.png'>
                    <link rel='stylesheet' href='../../css/footer.css'>
                     <link rel='stylesheet' href='../../CSS Dashboard/blog-card.css'>";
        $content .= "</head>";
        $content .= "<body>";
        // $content .= '<img class="blog-card-header" src="../blog-images/mob.jpg">';
        $content .= '<?php require "../../database/db-conn.php";';
        $content .= "\$sql = 'SELECT * FROM blog WHERE id = {$i}';";
        $content .= "\$query = mysqli_query(\$conn, \$sql);";
        $content .= "while (\$row = mysqli_fetch_assoc(\$query)) {";
        $content .= "\$name = ''; if(\$row['article_category'] === 'Семейство') {
            \$name = 'Семейство';
        } else if(\$row['article_category'] === 'Здраве') {
            \$name = 'Здраве';
        } else if(\$row['article_category'] === 'Емоции') {
            \$name = 'Емоции';
        } else   if(\$row['article_category'] === 'Развитие') {
            \$name = 'Развитие';
        }";
        $content .= "echo \"<div class='allHeader'><a href='../../za-smeli-roditeli-blog'>Всички статии</a>
              <a href='\" . \$row['return_link'] . \"'>Статии \$name</a></div>\";";
        $content .= 'echo "<div class=\'div-blog\'>";';
        $content .= "echo \"<div class='displayIMG'>\" . \$row['content_display'] . \"</div>\";";
        $content .= "echo \"<div class='phoneIMG'>\" . \$row['content'] . \"</div></div>\";";

        $content .= "}require '../footerBLog.php'; ?>";
        $content .= " <script>
            tinymce.init({
                selector: '#mainText',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat'
            });
        </script>";
        $content .= "</body>";
        $content .= "</html>";

        file_put_contents($fullPath, $content);


        $i++;
      }
    } else if ($formType === "changeInfo") {

      $idToUpdate = $_POST['updateID'];
      $title_change = $_POST['change-heading'];
      $subTitle_change = $_POST['text-subtitle'];

      $content_change =  $_POST['mainText_change'];
      $mainText_change_phone = $_POST['mainText_change_phone'];

      $target_dirChange = "blog-images/";
      $target_fileChange = $target_dirChange . basename($_FILES["change-pic"]["name"]);

      if (move_uploaded_file($_FILES["change-pic"]["tmp_name"], $target_fileChange)) {

        $sqlImgUpdate = "UPDATE blog SET img='$target_fileChange' WHERE ID = $idToUpdate";
        $queryImageUpdate = mysqli_query($conn, $sqlImgUpdate);
      } else {
        $sqlSet = "UPDATE blog SET header_article='$title_change', sub_title='$subTitle_change', 
        content='$mainText_change_phone', content_display='$content_change' WHERE ID = $idToUpdate";

        $querySet = mysqli_query($conn, $sqlSet);
      }
    }
  }

  ?>



  <script>
    $(document).ready(function() {

      $.ajax({
        url: '../ajax/get_articles.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {


          for (let i = 0; i < data.id.length; i++) {

            let id = data.id[i];
            let image = data.img[i];
            let header_article = data.header_article[i];
            let sub_article = data.sub_title[i];
            let article_link = data.article_link[i];
            let article_category = data.article_category[i];
            let content = data.content[i];
            let displContent = data.content_display[i];


            $('.containerArticles').append(`
            <form class='update-article-form' method='post' enctype='multipart/form-data'>
            <input type='hidden' class='hiddenInput' name='updateID' value='${id}'>

            <div class='divOne'>

            <div class='this-article-pic'>
            <label for='pic-article'>Снимка на статията: </label><br>
            <img id='pic-article' class='article-image' src='./${image}' alt='article-image'><br>
            </div>

            <div class='pic-and-label'>
            <label for='change-pic'>Промяна на снимка: </label>
            <input name='change-pic' id='change-pic' type='file'>
            </div>

            <label for='change-heading'>Заглавие:</label>
            <input value='${header_article}' class='format-label' id='change-heading' name='change-heading' type='text'>

            <label for='text-subtitle'>Текст подзаглавие: </label>
            <textarea class='format-label' id='text-subtitle' name='text-subtitle' placeholder='Подзаглавие...'>${sub_article}</textarea>

            <label for='change_category'>Категория</label>
            <select disabled class='format-label' id='change_category' name='change_category'>
            <option value='Семейство'${article_category === 'Семейство' ? ' selected' : ''}>Семейство</option>
            <option value='Емоции'${article_category === 'Емоции' ? ' selected' : ''}>Емоции</option>
            <option value='Развитие'${article_category === 'Развитие' ? ' selected' : ''}>Развитие</option>
            <option value='Здраве'${article_category === 'Здраве' ? ' selected' : ''}>Здраве</option>
            </select>

            </div>
            <div class='divTwo'>

            <label style="text-decoration: underline; font-size: 20px;" for='mainText_change'>Съдържание ГОЛЯМ екран</label><br><br>
            <textarea name='mainText_change' class='mainText_change'>${displContent}</textarea>

            <label style="text-decoration: underline; font-size: 20px;" for='mainText_change_phone'>Съдържание МАЛЪК екран</label><br><br>
            <textarea name='mainText_change_phone' class='mainText_change'>${content}</textarea>

            <button class='save-changes-btn' name='changeDataBtn' id='changeDataBtn' type='submit'>Запази промени</button>
            <button class='deleteArticle'>Изтрии статия</button>

            <input type='hidden' name='formType' value='changeInfo'>
            </div>
            </form>`);

            tinymce.init({
              selector: '#mainText, .mainText_change',
              toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',

            });

          }

          let saveChangesBTN = $('.save-changes-btn');

          $('.formDel button:last-child').on('click', function(a) {
            a.preventDefault();
            $('.backgroundBlog').css('display', 'none');
          });


          $('.deleteArticle').on('click', function(prev) {

            prev.preventDefault();

            let articleForm = $(this).closest('.update-article-form');
            let number = articleForm.find('.hiddenInput').val();



            $('.backgroundBlog').css('display', 'inline-flex');
            $('.formDel button:first-child').css('display', 'inline-flex');
            $('.delModal').find('h1').text('Внимание!');
            $('.delModal').find('p').text('Сигурни ли сте че искате да изтриете тази статия?');

            let inputNumber = {
              id: number
            }


            $('.formDel button:first-child').on('click', function(z) {

              z.preventDefault();


              $.ajax({
                url: '../ajax/deleteArticle.php',
                data: JSON.stringify(inputNumber),
                method: 'POST',
                contentType: 'application/json',
                success: function(data) {

                  let parsedData = JSON.parse(data);

                  if (parsedData.status === 'deleteSuccess') {

                    $('.formDel button:first-child').css('display', 'none');
                    $('.delModal').find('h1').text('Успех');
                    $('.delModal').find('p').text('Статията беше изтрита успешно :) Моля рефрешнете браузъра!');

                  }

                },

              });
            })
          });
        },
      });
    });
  </script>

  <script src="/js/sidebar.js"></script>

  <script>
    tinymce.init({
      selector: '#mainText, .mainText_change, #mainSmall',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',

    });
  </script>
</body>

</html>