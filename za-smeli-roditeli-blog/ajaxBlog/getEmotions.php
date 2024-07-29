<?php 


require "../../database/db-conn.php";

$sql = "SELECT * FROM blog WHERE article_category  = 'Емоции'";
$query =  mysqli_query($conn, $sql); 

$imageLinks = array();
$header = array();
$subArticle = array();
$articleLink = array();
$category = array();
$content = array();

$response = array();

while($row = mysqli_fetch_assoc($query)) {

  $imageLinks[] = $row['img'];
  $header[] = $row['header_article'];
  $subArticle[] = $row['sub_title'];
  $articleLink[] =  $row['article_link'];
  $category [] = $row['article_category'];
  $content [] = $row['content'];


}


if($query) {
  $response[] = array(
    'imgLinks' => $imageLinks,
    'header' => $header,
    'subArticle' => $subArticle,
    'articleLink' => $articleLink,
    'category' => $category,
    'content' => $content,
  
  
  );
  
  echo json_encode($response);
  
}


?>