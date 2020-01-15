<?php
/**
 * ============== Template Name: Standard Page
 *
 * @package silverless
 */
get_header();?>

<?php get_template_part("template-parts/hero"); ?>

<?php if( get_field('content') ): ?>
<section class="primary_dark section">
    <div class="container cols-offset-8-16 cols-xl-offset-2-20">
    	<div class="col seperator">
	    	<?php the_field('content'); ?>
	    </div>
    </div>
</section>
<?php endif; ?>

<?php get_footer();?>