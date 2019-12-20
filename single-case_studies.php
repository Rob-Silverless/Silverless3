<?php
/**
 * The template for displaying all single case studies
 *
 * @package silverless
 */
get_header();
while ( have_posts() ): the_post(); ?>

<!-- ******************* Hero Content ******************* -->

<?php get_template_part("template-parts/hero"); ?>

<!-- ******************* Hero Content END ******************* -->

<?php 
$colour = get_field('page_colour')
;?>

<!--INTRODUCTION-->

<?php if( have_rows('introduction') ):
    		while( have_rows('introduction') ): the_row(); ?>
	<div id="introduction" class="boxed-content <?php echo $colour;?>">
		<div class="container cols-offset4-16 text-center read_more_container">
			<div class="col">
				<?php if( get_field('introduction_heading') ): ?>
					<h2><?php the_sub_field('introduction_heading');?></h2>
				<?php endif; ?>
				<?php the_sub_field('introduction_text');?>
				<?php if( get_field('introduction_text_read_more') ): ?>
					<?php the_sub_field('introduction_text_read_more');?>
					<a class="button read-more" href="#"><span><?php the_sub_field('introduction_read_more');?></span></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endwhile; endif;?>

<!--MAIN CONTENT-->
<div id="content" class="boxed-content">
<?php if( have_rows('content') ):
		while( have_rows('content') ): the_row(); ?>

	<div class="container  container-small grid-gap cols-12 no-sm-gutter cols-sm-24">
		<div class="col">
			<?php the_sub_field('left_column');?>
		</div>
		<div class="col">
			<?php the_sub_field('right_column');?>
		</div>
	</div>
	<?php endwhile; endif;?>



	<!--GALLERY-->
	<div class="container container-small cols-24">
		
		<div class="col gallery">
			
			<?php 
			$images = get_field('gallery');
			if( $images ): ?>
			        <?php foreach( $images as $image ): ?>
			            <div class="img-wrapper slow-fade" style="background-image: url(<?php echo $image['sizes']['large']; ?>)">
			                <a href="<?php echo esc_url($image['url']); ?>">
			                </a>
			                <p><?php echo esc_html($image['caption']); ?></p>
			            </div>
			        <?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>

	<!--TESTIMONIAL-->
	<?php if( have_rows('testimonial') ):
			while( have_rows('testimonial') ): the_row(); ?>
		<div class="boxed-content">
		
				<?php get_template_part("template-parts/testimonial"); ?>
		</div>
	<?php endwhile; endif;?>
</div>






<?php endwhile;?>

<!-- CASE STUDIES -->

<?php get_template_part("template-parts/case-studies-list"); ?>




<!--CONTACT BOX-->
<?php if( have_rows('contact_box') ):
	while( have_rows('contact_box') ): the_row(); ?>
	<div class="boxed-content <?php echo $colour;?>">
		<?php get_template_part("template-parts/contact-box"); ?>
	</div>
<?php endwhile; endif;?>
<?php get_footer(); ?>