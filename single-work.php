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
	<div class="container cols-offset-8-16 cols-sm-24">
		<div class="col page-title">
			<h1 class="seperator_reverse"><?php the_sub_field('heading');?></h1>
		</div>
	</div>
</section>
<?php if( get_sub_field('background_image')): ?>
<div class="hero h75 slow-fade" style="background-image: url(<?php echo get_sub_field('background_image'); ?>); background-color: <?php echo $heroColor; ?>;">

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
<section class="primary_dark section section-override">
	<div class="container cols-offset-8-8 cols-lg-offset-4-16 cols-sm-24">
		<div class="col">
			<p>
				<strong><?php the_sub_field('copy_heading');?></strong>
			</p>
			<p>
				<?php the_sub_field('copy');?>
			</p>
		</div>
	</div>
	<div class="container cols-offset-8-14 cols-lg-offset-1-22 cols-sm-24">

		<?php if( have_rows('gallery') ):?>
			<div class="col gallery">
		<?php while( have_rows('gallery') ): the_row();?>
		
			<?php if( get_row_layout() == 'full_width' ):
            	$image = get_sub_field('image');?>
            	<div class="gallery-component gallery-component__fullwidth">
					<div class="img-wrapper slow-fade fullwidth" style="background-image: url('<?php echo $image['url']?>)">
		                <a href="<?php echo $image['url']?>">
		                </a>
		            </div>
	            </div>
            <?php elseif( get_row_layout() == '5050' ): 
	            $image = get_sub_field('image');
	            $image_second = get_sub_field('image_second');?>
	            <div class="gallery-component gallery-component__half">
			        <div class="img-wrapper slow-fade __5050" style="background-image: url('<?php echo $image['url']?>)">
		                <a href="<?php echo $image['url']?>">
		                </a>
		            </div>
		            <div class="img-wrapper slow-fade __5050" style="background-image: url('<?php echo $image_second['url']?>)">
		                <a href="<?php echo $image_second['url']?>">
		                </a>
		            </div>
		        </div>
	        <?php elseif( get_row_layout() == 'triumvirate' ): 
	            $image = get_sub_field('image');
	            $image_large = get_sub_field('image_large');
	            $image_third = get_sub_field('image_third');
	            if( get_sub_field('direction') == 'left' ):
					$direction = "gallery__left";
				elseif( get_sub_field('direction') == 'right' ):
					$direction = "gallery__right";
				endif;
	            ?>
	            <div class="gallery-component  gallery-component__triumvirate <?php echo $direction;?>">
			        <div class="img-wrapper slow-fade triumvirate" style="background-image: url('<?php echo $image['url']?>)">
		                <a href="<?php echo $image['url']?>">
		                </a>
		            </div>
		            <div class="img-wrapper slow-fade triumvirate" style="background-image: url('<?php echo $image_large['url']?>)">
		                <a href="<?php echo $image_large['url']?>">
		                </a>
		            </div>
		            <div class="img-wrapper slow-fade triumvirate" style="background-image: url('<?php echo $image_third['url']?>)">
		                <a href="<?php echo $image_third['url']?>">
		                </a>
		            </div>
		        </div>
            <?php endif; ?>
		
		<?php endwhile;?>
		</div>
		<?php endif;?>
	</div>
</section>

<?php endwhile; endif;?>
<section class="primary_light section">
	<?php get_template_part("template-parts/works-list"); ?>
</section>

<?php get_footer(); ?>