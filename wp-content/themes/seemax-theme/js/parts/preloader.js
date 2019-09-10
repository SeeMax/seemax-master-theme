$(function preLoaderOn() {
	$(window).load(function(){
		$('#preloader').fadeOut('slow',function(){$(this).remove();});
	});
});
