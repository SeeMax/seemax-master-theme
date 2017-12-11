<?php /* Template Name: 404 Page */ get_header(); ?>
<!-- ADD UNIQUE CUSTOM CLASS TO BODY IF REQUIRED -->
    <!-- <?php // function add_nav_menu_css( $classes ) { $classes[] = 'page about'; return $classes;}  add_filter( 'body_class', 'add_nav_menu_css' );?> -->
<!-- END ADD UNIQUE CUSTOM CLASS TO BODY IF REQUIRED -->
<main class="404-page">
    <?php while (have_posts()) : the_post(); ?>
        <section class="main-section">
            <div class="content">
              <h1><?php the_field('404_error_heading','option'); ?></h1>
              <h2><?php the_field('404_error_subheading','option'); ?></h2>
              <div class="button">
                <a href="<?php echo site_url();?>"></a>
                <?php the_field('404_error_button_text','option'); ?></a>
              </div>
            </div>
        </section>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>

