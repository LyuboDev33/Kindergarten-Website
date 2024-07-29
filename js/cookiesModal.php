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