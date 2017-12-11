<?php /* Template Name: Contact */ get_header(); ?>
<!-- ADD UNIQUE CUSTOM CLASS TO BODY IF REQUIRED -->
	<!-- <?php // function add_nav_menu_css( $classes ) { $classes[] = 'page contact'; return $classes;}  add_filter( 'body_class', 'add_nav_menu_css' );?> -->
<!-- END ADD UNIQUE CUSTOM CLASS TO BODY IF REQUIRED -->
<main class="contact-page">
	<?php while (have_posts()) : the_post(); ?>
		<section class="main-section">
			<div class="content">
				<?php the_content(); ?>
			</div>
		</section>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
