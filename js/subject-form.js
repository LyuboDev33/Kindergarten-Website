// CODE FOR DISPLAYING THE CONTACT INFO

if (window.innerWidth < 550) {

  $('.call-usSubject').text('Обадете ни се')


} else {

  $('.call-usSubject').text('Свържете се с нас')
  $('.call-usSubject').closest('a').removeAttr('href');

  $('.call-usSubject').on('click', function () {

    $('.containerMain').css('display', 'flex');
    $('.modalMain').css('opacity', '1');

  });

  $('.modalMain button').on('click', function () {

    $('.containerMain').css('display', 'none');
 
  });


}