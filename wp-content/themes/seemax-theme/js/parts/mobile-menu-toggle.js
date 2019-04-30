$(function mobileMenu() {

	$(".menuToggle").on('click', function() {
		console.log("click");

		var tl = new TimelineMax(),
				$this = $(this),
				fullMenu = $(".main-nav"),
				links = $("nav li"),
				ham1 = $(".hamTop"),
				ham2 = $(".hamMid"),
				ham3 = $(".hamBot"),
				uniTime2 = 0.15,
				uniEase = Back.easeIn.config(1),
				uniEase2 = Back.easeOut.config(1);

		if ($this.hasClass("navOpen")) {
			$this.removeClass("navOpen");
			tl.set($(".wrapper"), {height:"auto",overflow:"visible"})
				.staggerTo(links, 0.3, {opacity:0, x:"50%", ease: uniEase2}, 0.03, "menuClose")
				.to(fullMenu, 0.3, {left:"101%"}, "menuClose+=0.2")
				.to(ham1, uniTime2, {width:"100%", rotation:0, y:0}, "menuClose")
				.to(ham2, uniTime2, {width:"100%", x:0, opacity:1}, "menuClose")
				.to(ham3, uniTime2, {width:"100%", rotation:0, y:0}, "menuClose");


		} else {
			$this.addClass("navOpen");
			tl.set($(".wrapper"), {height:"100%", overflow:"hidden"})
				.set(links, {opacity:0, x:"50%"})
				.to(fullMenu, 0.3, {left:"0%"}, "menuOpen")
				.staggerTo(links, 0.2, {opacity:1, x:"0%", ease: uniEase2}, 0.05, "menuOpen+=0.05")
				.to(ham1, uniTime2, {rotation:227, y:5, width:"80%"}, "menuOpen")
				.to(ham2, uniTime2, {width:"70%", x:5, opacity:0}, "menuOpen")
				.to(ham3, uniTime2, {rotation:-227, y:-5, width:"80%"}, "menuOpen");
		}
	});

});
