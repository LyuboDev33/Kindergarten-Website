$(document).ready(function() {

  if (document.cookie.includes('kindergarten')) {
      $('.format-modal').css('display', 'none');

    return;
  }
    
    
    
    
  let modal = $('.modal');

  setTimeout(function (){
    modal.css({
      "transform": "translateY(-210px)",
      'transition': '1s'
    });
  
    let btn = $('.btn');
  
    btn.on('click', () => {
  
      modal.css({
        "transform": "translateY(360px)",
        "transition": "1s"
      });
    });
  
    $("#agreeButton").on("click", function() {
      document.cookie = "cookieBy=kindergarten; max-age=" + (7 * 24 * 60 * 60) + "; path=/";
      $('.format-modal').css('background', 'none');
      $('.indexPage').css('position', 'relative');
      
      setTimeout(function () {
      $('.format-modal').css('display', 'none');
      }, 1000);
      
    });


  }, 500)

});