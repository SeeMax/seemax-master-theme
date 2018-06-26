$(document).ready(function() {
  $('a[href*=\\#]').bind('click', function(e) {
    //prevent the "normal" behaviour which would be a "hard" jump
    e.preventDefault();

    //Get the target
    var target = $(this).attr("href");

  // perform animated scrolling by getting top-position of target-element and set it as scroll target
  $('html, body').stop().animate({
    scrollTop: $(target).offset().top -10
  }, 1000);

  // IF IT"S MOBILE / IPAD OR SMALLER
  if (screen.width <= 1025){

  }

  return false;

  });
});
