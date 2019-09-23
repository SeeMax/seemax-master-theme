<?php /* Template Name: 404 Page */ get_header(); ?>
<main class="four-oh-four-page">
  <section class="main-section">
      <div class="content">
        <h1><?php the_field('404_heading','option'); ?></h1>
        <h3><?php the_field('404_subheading','option'); ?></h3>
        <div class="button">
          <a class="c-block-fill" href="<?php the_field('404_button_dest','option'); ?></a>"></a>
          <?php the_field('404_button_text','option'); ?></a>
        </div>
      </div>
  </section>
</main>
<?php get_footer(); ?>
