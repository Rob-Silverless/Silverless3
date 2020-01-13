<?php
/**
 * ============== Template Name: Work Page
 *
 * @package silverless
 */
get_header();?>

<?php get_template_part("template-parts/hero"); ?>

<section class="primary_dark section find-work section-override">
	<?php get_template_part("template-parts/works-list"); ?>
</section>

<?php get_footer();?>