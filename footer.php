<?php
/**
 * The template for displaying the footer
 * @package silverless
 */
?>

</main>

<footer class="footer">

	<div class="pre-socket"></div><!--pre-socket-->

	<div class="socket">
		<?php if (!is_page_template('page-templates/home.php')) {?>
			<div class="container cols-offset-8-16 cols-sm-24 sm-text-center">
				<div class="col work-together">
					<h2>Let's Work Together</h2>
				</div>
			</div>
		<?php }?>

		<div class="container cols-8-16 cols-sm-24-24 sm-text-center">

			<div class="col silverless">
				<?php if (!is_page_template(array('page-templates/careers.php', 'page-templates/contact.php'))) {?>
					<?php get_template_part('inc/img/silverless', 'logo');?>
				<?php }?>
			</div>

			<div class="col footer-contact">

				<?php if (!is_page_template(array('page-templates/careers.php', 'page-templates/contact.php'))) {?>

					<?php get_template_part("template-parts/contact-details"); ?>

					<div class="directions">
						<a class="button btn-alt" href="<?php the_field('button_target', 'option');?>"><span><?php the_field('button_label', 'option');?></span></a>
					</div>
				<?php } else {?>
					<div class="footer-seperator"></div>
				<?php } ?>
				<div class="colophon">
					<div><?php the_field('footer_info', 'option');?></div>
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
