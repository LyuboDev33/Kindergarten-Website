$(document).ready(function () {

  if (window.innerWidth < 550) {

    $('.call-us').text('Обадете ни се')


  } else {

    $('.call-us').text('Свържете се с нас')
    $('.call-us').closest('a').removeAttr('href');

    $('.call-us').on('click', function () {

      $('.containerMain').css('display', 'flex');
      $('.modalMain').css('opacity', '1');

    });

    $('.modalMain button').on('click', function () {

      $('.containerMain').css('display', 'none');
   
    });


  }

  let greenForest = $('.kids-menus-forest-div');
  let paint = $('.kids-menus-paintingDiv');
  let purpleBOok = $('.kids-menus.purpleDiv');
  let textBook = $('.kids-menus-textbook');

  greenForest.addClass('animate__animated animate__fadeInTopRight');
  paint.addClass('animate__animated animate__fadeInDown');
  purpleBOok.addClass('animate__animated animate__fadeInTopLeft');
  textBook.addClass('animate__animated animate__fadeInDown');

  setTimeout(function () {
    greenForest.removeClass('animate__animated animate__fadeInTopRight');
    paint.removeClass('animate__animated animate__fadeInDown');
    purpleBOok.removeClass('animate__animated animate__fadeInTopLeft');
    textBook.removeClass('animate__animated animate__fadeInDown');


  }, 1000);

  let valuesBackground = $('.values-background');
  let containerDivs = $('.container-divs');
  let headerValues = $('.header-values');

  valuesBackground.waypoint(function () {
    headerValues.eq(0).addClass('animate__animated animate__fadeInUp');
    headerValues.css('animation-duration', '1.5s');
    headerValues.css('opacity', '1');

    containerDivs.addClass('animate__animated animate__fadeInUp');
    containerDivs.css('animation-duration', '1.5s');
    containerDivs.css('opacity', '1');


  }, { offset: "78%" });


  let needInfo = $('.need-info');
  let infoHeader = $('.contact-us');
  let callUsBTN = $('.call-us');


  let docLoaded = $(document).length;


  needInfo.waypoint(function () {

    if (docLoaded > 1) {

      return;

    }

    infoHeader.addClass('animate__animated animate__fadeIn');
    infoHeader.css('animation-duration', '3s');
    infoHeader.css('opacity', '1');

    setTimeout(function () {
      callUsBTN.addClass('animate__animated animate__fadeInUp');

      callUsBTN.css('animation-duration', '2.5s');
      callUsBTN.css('opacity', '1');

      setTimeout(function () {
        callUsBTN.addClass('animate__animated animate__heartBeat').removeClass('animate__animated animate__fadeInUp');
        callUsBTN.css('animation-duration', '1.5s');

        docLoaded += 1;

        setTimeout(function () {
          callUsBTN.removeClass('animate__animated animate__heartBeat').removeClass('animate__animated animate__fadeInUp');

        }, 3000)

      }, 2200);

    }, 500);

    setTimeout(function () {
      $('.header-valuesActuals').css('opacity', '1');
      $('.header-valuesActuals').addClass('animate__animated animate__fadeInUp');
    }, 300)


  }, { offset: "82%" });



  let blogsMain = $('.blog-cart.first'); 
  let preventNumb = $(document).length;



  blogsMain.eq(0).waypoint(function () { 
    if (preventNumb > 1) {
        return;
    }

    blogsMain.eq(0).addClass('animate__animated animate__fadeInLeft');
    blogsMain.eq(0).css('animation-duration', '1s');
    blogsMain.eq(0).css('opacity', '1');

    setTimeout(function() {
        blogsMain.eq(0).removeClass('animate__animated animate__fadeInLeft');
        blogsMain.eq(0).css('opacity', '1');
        preventNumb += 1;

        console.log(preventNumb);
    }, 1000);
}, { offset: '75%' });

blogsMain.eq(1).waypoint(function () {

    if (preventNumb >= 3) {
        return;
    }

    blogsMain.eq(1).addClass('animate__animated animate__fadeInRight');
    blogsMain.eq(1).css('animation-duration', '1s');
    blogsMain.eq(1).css('opacity', '1');
        preventNumb += 1;

    setTimeout(function() {
        blogsMain.eq(1).removeClass('animate__animated animate__fadeInRight');
        blogsMain.eq(1).css('opacity', '1');

        console.log(preventNumb);
    }, 1000);
}, { offset: '75%' });

blogsMain.eq(2).waypoint(function () {
    if (preventNumb >= 5 || preventNumb === 4) {
        return;
    }

    blogsMain.eq(2).addClass('animate__animated animate__fadeInLeft');
    blogsMain.eq(2).css('animation-duration', '1s');

    setTimeout(function() {
        blogsMain.eq(2).removeClass('animate__animated animate__fadeInLeft');
        blogsMain.eq(2).css('opacity', '1');
        preventNumb += 1;
      console.log(preventNumb);
       }, 1000);
}, { offset: '70%' });

})
