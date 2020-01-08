<?php
/**
 * ============== Template Name: Projects Page
 *
 * @package silverless
 */
get_header();?>

<?php get_template_part("template-parts/hero"); ?>

<section class="primary_dark">
	<div class="container cols-offset-8-8">
		<div class="col">
			<?php the_field('content');?>
		</div>
	</div>
</section>

<section class="primary_dark section find-work">
	<?php get_template_part("template-parts/projects-list"); ?>
</section>

<?php get_footer();?>