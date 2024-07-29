<footer class="footer indexPage" id="blog-footer">

  <div class="displayMode">


    <div class="row-contacts">
      <ul class="first-ul">
        <li><span style="font-size: 16px; ">София, ж.к. Изток <br> ул. „д-р Любен Русев“ 24</li>
        <li><span style="font-size: 16px; "> ул. „Тинтява“ 12А</li>
        <li><span style="font-size: 16px;">0876 620 707</li>
        
      </ul>

      <div class='divPics'>
        <p class="find-us">Открий ни:</p><br>
        <div class="row-tags">
        <a  target="_blank" href="https://www.facebook.com/prikluchenci.bg"><img id="facebook" src="../../images/fbPic-removebg-preview.png" alt="facebook"></a>
          <a target="_blank" href="https://www.instagram.com/prikluchenci.bg/"><img id="instagram" src="../../images/instaPic-removebg-preview.png" alt="instagram"></a>
          <a target="_blank" href="https://www.tiktok.com/@prikluchenci.bg?_t=8kOWA8DE7TU&_r=1&fbclid=IwAR1HSek_Ldgxng3D3WCMmh6qbFsIokB1QJrK7aT8WbTwOGoYeL_rjgIQpwg"><img id="tiktok" src="../../images/tiktoPic-removebg-preview.png" alt="tiktok"></a>
        </div>

      </div>

    </div>

  </div>

  <div class="row">
    <ul class="second-ul">

      <div class="styleDiv">
        <li><a href="./privacy-policy/policy.php">Политика за поверителност <span class="spaceSpan">&nbsp | &nbsp</span></a></li>
        <li><a href="./privacy-policy/terms-and-conditions.php">Общи условия</a></li>
      </div>
      <p class="created">Създадено с много <span style="color: red;">&#x2764</span> от Digital Education</p>

    </ul>
  </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="format-modal">
  <div class="modal">
    <img class="cookie-img" src="https://cdn-icons-png.flaticon.com/512/1047/1047711.png" alt="cookies-img" />
    <p>Ние използваме бисквитки с цел защита на вашите данни и подобряване работата на сайта.</p>
    <button id="agreeButton" class="btn">Съгласен съм</button>
  </div>
</div>

<style>

.format-modal {
    height: 100vh;
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    background: #00000070;
    display: flex;
    justify-content: center;
}

  .cookie-img {
    height: 55px;
  }

  .modal p {
    text-align: center;
    padding: 10px;
    color: black;
}

.btn {
    padding: 8px;
    padding-bottom: 10px;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 6px;
    font-size: 15px;
    /* box-shadow: 2px 2px 0 black; */
    color: white;
    background: #6db5db;
    border-radius: 10px;
    border: none;
    display: flex;
    /* text-align: center; */
    align-items: stretch;

}

.modal {
    box-shadow: 1px 1px 4px rgb(0 0 0 / 25%);
    height: auto;
    width: 33%;
    padding: 10px;
    border-radius: 8px;
    bottom: 0;
    position: fixed;
    display: flex;
    flex-direction: column;
    align-items: center;
    transform: translateY(250px);
    background: #ffffff;
    justify-content: space-around;
    color: white;
    padding: 18px;
}

  @media (max-width: 550px) {

    .modal {
      box-shadow: 1px 1px 4px rgb(0 0 0 / 25%);
      height: auto;
      width: 80%;
      padding: 10px;
      border-radius: 8px;
      bottom: 0;
      position: fixed;
      display: flex;
      flex-direction: column;
      align-items: center;
      transform: translateY(250px);
      background: #ffffff;
      justify-content: space-around;
      color: white;
      padding: 18px;
    }


  }
</style>

<script>
  $(document).ready(function() {

    if (document.cookie.includes('kindergarten')) {
      $('.format-modal').css('display', 'none');

      return;
    }


    let modal = $('.modal');

    setTimeout(function() {
      modal.css({
        "transform": "translateY(-210px)",
        'transition': '2s'
      });

      let btn = $('.btn');

      btn.on('click', () => {

        modal.css({
          "transform": "translateY(360px)",
          "transition": "2s"
        });
      });

      $("#agreeButton").on("click", function() {
        document.cookie = "cookieBy=kindergarten; max-age=" + (7 * 24 * 60 * 60);
        $('.format-modal').css('background', 'none');
        $('.indexPage').css('position', 'relative');

        setTimeout(function() {
          $('.format-modal').css('display', 'none');
        }, 2100);

      });


    }, 500)

  });
</script>
