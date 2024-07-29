<!DOCTYPE html>
<html class="htmlStructure" lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/header.css">
  <link rel="stylesheet" href="../../css/footer.css">
  <link rel="stylesheet" href="../../css/blog-main-page.css">
  <link rel="icon" type="image/x-icon" href="../../images/Logo1.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
  <title>Секция Здраве</title>
  <!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '8138903319459079');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=8138903319459079&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
</head>
<body class="bodyStructure">

<img class="blogHeadPart" src="../../images/headerHealth.jpg" alt="header">



<div class="allHeader">
<a href='../../za-smeli-roditeli-blog'>Всички статии</a>
</div>


<div class="englishArticles">
  
</div>



<script>

$(document).ready(function () {


  $.ajax({

    type: "GET",
    url: "./ajaxBlog/getHealth.php",
    contentType: "application/json",
    success: function (response)  {

      let parsedResult = JSON.parse(response);

      let imgLink = parsedResult[0].imgLinks;
      let header = parsedResult[0].header;
      let subArticle = parsedResult[0].subArticle;
      let articleLink = parsedResult[0].articleLink;
      let category = parsedResult[0].category;
      let content = parsedResult[0].content;

      for(let i = 0; i < imgLink.length && header.length && subArticle.length && articleLink.length && category.length && content.length; i++) {

        $('.englishArticles').append(`
        
        <div>
        <div class='article-box'>
        <div>
          <img class='imgs-articleBox' src='../../dashboard/${imgLink[i]}'>
        </div>

          <div class='headerPosition'>
        <h3 class='header-articles'>${header[i]}</h3>


        </div>

        <div class='small-text-div'>
          <p class='small-text'>${subArticle[i]}</p>
        </div>

        <div class='article-footer'>

          <p class='subject'>Категория: ${category[i]}</p>
            <a href='/dashboard/blog-files/${articleLink[i]}'><button class='button-link'>Научи повече</button></a>
        
        </div>
        </div>
        </div>`)

      }


    }


  });

}); 

</script>

<?php 

require "../dashboard/footerBLog.php"; ?>
  
</body>
</html>