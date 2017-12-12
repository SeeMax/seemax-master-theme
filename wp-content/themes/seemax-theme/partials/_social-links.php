<!-- SOCIAL MEDIA ICONS HEADER  -->
<ul class="social-icon-list">
	<?php if(get_field('instagram')): ?><li><a href="<?php the_field('instagram', 'option'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/insta-icon.svg" ></a></li><?php endif; ?>
	<?php if(get_field('instagram')): ?><li><a href="<?php the_field('facebook', 'option'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/fb-icon.svg" ></a></li><?php endif; ?>
	<?php if(get_field('instagram')): ?><li><a href="<?php the_field('twitter', 'option'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/twit-icon.svg" ></a></li><?php endif; ?>
</ul>
<!-- END SOCIAL MEDIA ICONS HEADER  -->
