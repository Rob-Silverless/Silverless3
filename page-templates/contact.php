<?php
/**
 * ============== Template Name: Contact Page
 *
 * @package silverless
 */
get_header();?>

<?php get_template_part("template-parts/hero"); ?>

<section class="primary_dark section">
    <div class="container cols-offset-8-8">
    	<div class="col footer-contact">
	    	<?php get_template_part("template-parts/contact-details"); ?>
	    </div>
    </div>
</section>

<?php echo do_shortcode('[wp_mapbox_gl_js map_id="196"]');?>

<?php get_footer();?>