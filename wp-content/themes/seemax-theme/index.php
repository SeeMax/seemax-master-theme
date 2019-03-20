<?php get_header(); ?>
	<main class="default-page">
		<?php while (have_posts()) : the_post(); ?>

			<?php if( have_rows('hero_section') ):?>
			  <?php while ( have_rows('hero_section') ) : the_row();?>
			    <?php $backgroundImage = get_sub_field('image');?>
			    <section class="hero-section background-image-section"
						style="background: url('<?php echo $backgroundImage[url];?>')">
		        <div class="content">
		          <h1 class="c-width-50"><?php the_sub_field('headline');?></h1>
		        </div>
			    </section>
			  <?php endwhile;?>
			<?php endif;?>
	    <section class="default-section">
        <div class="content">
					<?php the_content(); ?>
        </div>
	    </section>
		<?php endwhile; ?>
	</main>
<?php get_footer(); ?>
