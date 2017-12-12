$(document).ready(function() {
  $('a[href*=\\#]').bind('click', function(e) {
    e.preventDefault(); //prevent the "normal" behaviour which would be a "hard" jump
       
  var target = $(this).attr("href"); //Get the target
      
  // perform animated scrolling by getting top-position of target-element and set it as scroll target
  $('html, body').stop().animate({ scrollTop: $(target).offset().top -70 }, 1000);

  // IF IT"S MOBILE CLOSE THE NAV
  if (screen.width <= 1025){
    closeNav();
  }

  return false;

  });
});