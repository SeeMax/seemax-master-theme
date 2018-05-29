<footer class="footer" role="contentinfo">
	<div class="content">
		<div class="footer-tile logo-tile c-width-32">
			<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" >
		</div>
		<div class="footer-tile info-tile c-width-32">
			<ul>
				<li class="footer-tile-header">
					CONTACT
				</li>
				<li>
					<a class="c-block-fill" href="tel:<?php the_field('phone_number', 'options');?>"></a>
					<?php the_field('phone_number', 'options');?>
				</li>
				<li>
					<?php the_field('address_1', 'options');?>
					<br />
					<?php the_field('address_2', 'options');?>
				</li>
				<li>
					<a class="c-block-fill" href="mailto:<?php the_field('email_address', 'options');?>"></a>
					<?php the_field('email_address', 'options');?>
				</li>
			</ul>
		</div>
		<div class="footer-tile social-tile c-width-32">
			<ul>
				<li class="footer-tile-header">
					Social
				</li>
				<li>
					<a class="c-block-fill" href="<?php the_field('facebook_link', 'options');?>" target="_blank"></a>
					<i class="fab fa-facebook"></i>
				</li>
				<li>
					<a class="c-block-fill" href="<?php the_field('instagram_link', 'options');?>" target="_blank"></a>
					<i class="fab fa-instagram"></i>
				</li>
			</ul>
		</div>
		<div class="copyright">
			&copy; Copyright 2018
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</div><!-- WRAPPER -->
</body>
</html>
