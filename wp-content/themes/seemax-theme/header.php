<!doctype html>
<html <?php language_attributes(); ?> class="no-js loader-class">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php the_title(); ?></title>

	<link href="//www.google-analytics.com" rel="dns-prefetch">
  <link href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" rel="shortcut icon">
   <!-- <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed"> -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-77219320-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-77219320-2');
	</script>

</head>
<body <?php body_class(); ?> >
<div class="wrapper">
<!-- ADD A PRE-LOADEDER
<div id="preloader">
	<img class="fug_Preloader" src="<?php // echo get_template_directory_uri();?>/img/fug_preloader.svg" >
</div> -->
	<header class="header" role="banner">
		<div class="content header-inner-wrap">
			<div class="header-logo">
				<a href="/">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" >
				</a>
			</div>
			<nav class="main-nav mainNav" role="navigation">
				<?php main_theme_nav(); ?>
			</nav>
			<div class="mobile-menu menuToggle">
				<span class="hamTop"></span>
				<span class="hamMid"></span>
				<span class="hamBot"></span>
			</div>
		</div>
	</header>
