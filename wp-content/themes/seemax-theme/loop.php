<!-- Copy in to page template -->
<?php $args = array(
  'post_type' => '',
  'posts_per_page' => -1,
  'order' => 'ASC',
  'orderby' => 'menu_order'
); $the_query = new WP_Query($args);?>
<?php if ($the_query->have_posts()) : ?>
	<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
		
		<?php $image = get_field('image'); if( !empty($image) ): ?>
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
		<?php endif; ?>
		<?php the_field('content');?>
					
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
<?php endif; ?>
