<?php /* Template Name: 404 Page */ get_header(); ?>
<main class="404-page">
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
</main>
<?php get_footer(); ?>
