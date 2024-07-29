<?php 

require "../database/db-conn.php";
$sqlGET =  "SELECT * FROM blog ORDER BY id DESC";
$queryGET = mysqli_query($conn, $sqlGET);


$id = array(); 
$img = array();
$header_article = array();
$sub_title = array();
$article_link = array();
$article_category = array();
$content = array();
$content_display = array();


while($row = mysqli_fetch_assoc($queryGET)) {

  $id[] = $row['id']; 
  $img[] = $row['img'];
  $header_article[] = $row['header_article'];
  $sub_title[] = $row['sub_title']; 
  $article_link[] = $row['article_link'];
  $article_category[] = $row['article_category'];
  $content[] = $row['content'];
  $content_display[] = $row['content_display'];

}


$response = array(
  'id' => $id,
  'img' => $img,
  'header_article' => $header_article,
  'sub_title' => $sub_title,
  'article_link' => $article_link,
  'article_category' => $article_category,
  'content' => $content,
  'content_display' => $content_display
);

echo json_encode($response);
?>