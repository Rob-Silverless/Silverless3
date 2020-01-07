<?php
/**
 * Single Work Custom Post Type
 *
 * @package silverless
 */
get_header();?>

<?php 
while( have_posts() ) {
    the_post();
}?>


<?php if( have_rows('hero') ):
	while( have_rows('hero') ): the_row();

if( get_field('type') == 'image' ):
	$heroImage = get_sub_field('background_image');
elseif ( get_field('type') == 'color' ):
	$heroColor = get_sub_field('colour');
endif;?>

<section class="primary_dark">
	<div class="container cols-offset-8-16">
		<div class="col page-title">
			<h1 class="seperator_reverse"><?php the_sub_field('heading');?></h1>
		</div>
	</div>
</section>
<?php if( get_sub_field('background_image')): ?>
<div class="hero h75" style="background-image: url(<?php echo get_sub_field('background_image'); ?>); background-color: <?php echo $heroColor; ?>;">

    <div class="container">
		<div class="col">
		    <div class="hero__content">
                <div class="inner-section">
                </div>
		    </div>
		</div>
	</div>

</div>
<?php endif;?>

<?php endwhile; endif;?>

<?php if( have_rows('info') ):
	while( have_rows('info') ): the_row();?>
<section class="primary_dark section">
	<div class="container cols-offset-8-8">
		<div class="col">
			<p>
				<strong><?php the_sub_field('copy_heading');?></strong>
			</p>
			<p>
				<?php the_sub_field('copy');?>
			</p>
		</div>
	</div>
</section>

<?php endwhile; endif;?>
<?php get_footer(); ?>