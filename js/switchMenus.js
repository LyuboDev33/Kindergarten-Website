let firstDiv = $('.firstDiv');
let secondDiv = $('.secondDiv');

let switchOne = $('#switchOne');
let switchTwo = $('#switchTwo');

function switchElements() {
  if (window.innerWidth > 550) {
      firstDiv.append(switchTwo); 
      secondDiv.prepend(switchOne); 
  } 
}

switchElements();
$(window).resize(switchElements);