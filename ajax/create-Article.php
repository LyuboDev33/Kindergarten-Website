<form class="create-article-form" method="post" enctype="multipart/form-data">

<div class="pic-and-label">
  <label class="choose-pic" for="pic-main-page">Избери снимка: </label>
  <input class="format-label" id="pic-main-page" name="pic-main-page" type="file">
</div>


<label for="heading-onPage">Заглавие:</label>
<input required class="format-label" id="heading-onPage" name="heading-onPage" type="text">

<label for="subTitle">Текст подзаглавие: </label>
<textarea required class="format-label" id="subTitle" name="subTitle" placeholder="Подзаглавие..."></textarea>

<label for="link">Линк към статията:</label>
<input required class="format-label" id="link" name="link" type="text">

<label for="catergory">Категория</label>
<select class="format-label" id="catergory" name="category">
  <option value="Английски">Английски</option>
  <option value="Математика">Математика</option>
  <option value="Български">Български</option>
  <option value="Човек и природа">Човек и природа</option>
</select>

<label for="mainText">Съдържание</label>
<textarea required name="mainText" id="mainText"></textarea>

<button type="submit" class="submitBtn" id="btnSubmit">Създай статия</button>

<input value="submitInfo" type="hidden" name="formType">

</form>



<!-- END OF FORM FOR SENDING DATA TO THE DATABASE -->

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$formType = $_POST['formType'];


if ($formType === "submitInfo") {

  $title = $_POST['heading-onPage'];
  $subTitle = $_POST['subTitle'];
  $link = $_POST['link'];
  if (!preg_match('/\.php$/', $link)) {
    $link .= '.php';
  }
  $category = $_POST['category'];
  $content =  $_POST['mainText'];

  $target_dir = "blog-images/";
  $target_file = $target_dir . basename($_FILES["pic-main-page"]["name"]);




  move_uploaded_file($_FILES["pic-main-page"]["tmp_name"], $target_file);


  $sqlCreate = "INSERT INTO blog (img, header_article, sub_title, article_link, article_category, content)
              VALUES ('$target_file', '$title', '$subTitle', '$link', '$category', '$content')";
  $queryCreate = mysqli_query($conn, $sqlCreate);

  $directory = "./blog-files/";
  $fullPath = $directory . $link;



  $sql = "SELECT * FROM blog";
  $query = mysqli_query($conn, $sql);

  $i = 0;

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
<link rel='stylesheet' href='../../CSS Dashboard/blog-card.css'>
<link rel='stylesheet' href='../../css/footer.css'>";
    $content .= "</head>";
    $content .= "<body>";
    $content .= '<img class="blog-card-header" src="../blog-images/main-page-pic.jpg">';
    $content .= '<?php require "../../database/db-conn.php";';
    $content .= "\$sql = 'SELECT * FROM blog LIMIT 1 OFFSET {$i}';";
    $content .= "\$query = mysqli_query(\$conn, \$sql);";
    $content .= "while (\$row = mysqli_fetch_assoc(\$query)) {";
    $content .= 'echo "<div class=\'div-blog\'> $row[content] </div>";';
    $content .= "}require '../../footer.php'; ?>";
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
  $link_change = $_POST['link-article'];

  if (!preg_match('/\.php$/', $link_change)) {
    $link_change .= '.php';
  }
  $category_change = $_POST['change_category'];
  $content_change =  $_POST['mainText_change'];

  $target_dirChange = "blog-images/";
  $target_fileChange = $target_dirChange . basename($_FILES["change-pic"]["name"]);

  if (move_uploaded_file($_FILES["change-pic"]["tmp_name"], $target_fileChange)) {

    $sqlImgUpdate = "UPDATE blog SET img='$target_fileChange' WHERE ID = $idToUpdate";
    $queryImageUpdate = mysqli_query($conn, $sqlImgUpdate);
  } else {
    $sqlSet = "UPDATE blog SET header_article='$title_change', sub_title='$subTitle_change', 
article_link='$link_change', article_category='$category_change', content='$content_change' WHERE ID = $idToUpdate";

    $querySet = mysqli_query($conn, $sqlSet);
  }
}
}

?>
