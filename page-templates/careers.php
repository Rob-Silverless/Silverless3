<?php
/**
 * ============== Template Name: Careers Page
 *
 * @package silverless
 */
get_header();?>

<?php get_template_part("template-parts/hero"); ?>

<?php if( get_field('content') ): ?>
<section class="primary_dark section">
    <div class="container cols-offset-8-8">
    	<div class="col seperator">
	    	<?php the_field('content'); ?>
	    </div>
    </div>
    <div class="container cols-offset-8-8">
    	<div class="col footer-contact">
	    	<?php get_template_part("template-parts/contact-details"); ?>
	    </div>
    </div>
</section>
<?php endif; ?>

<?php get_footer();?>