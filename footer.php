<?php
/**
 * The template for displaying the footer
 * @package silverless
 */
?>

</main>

<footer class="footer <?php if (is_page_template('page-templates/home.php')) {?>home_footer<?php }?>">

	<div class="pre-socket"></div><!--pre-socket-->

	<div class="socket">

		<div class="container cols-8-16">

			<div class="col silverless">
				<?php get_template_part('inc/img/silverless', 'logo');?>
			</div>

			<div class="col footer-contact">
				<div class="phone">
					<a href="tel:<?php the_field('phone', 'option'); ?>"><?php the_field('phone', 'option'); ?></a>
				</div>
				<div class="email seperator">
					<a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
				</div>
				<div class="social">
					<?php if( have_rows('social_links', 'options') ):
            			while( have_rows('social_links', 'options') ): the_row(); ?>
							<a href="<?php the_sub_field('link'); ?>" title="<?php the_sub_field('social_network'); ?>"><i class="fab fa-<?php the_sub_field('social_network'); ?>"></i></a>
					<?php endwhile; endif;?>
				</div>
				<div class="directions">
					<a class="button btn-alt" href="<?php the_field('button_target', 'option');?>"><span><?php the_field('button_label', 'option');?></span></a>
				</div>
				<div class="colophon">
					<?php the_field('footer_info', 'option');?>
					<span class="divider">|</span>

					<a href="<?php echo home_url() . '/privacy-policy'; ?>">Privacy</a>

					<span class="divider">|</span>

					<a href="<?php echo home_url() . '/terms-conditions'; ?>">Terms &amp; Conditions</a>
				</div>
			</div>

		</div>

	</div>

	</div><!--socket-->

</footer>

</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
