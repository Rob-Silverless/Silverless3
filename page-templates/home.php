<?php
/**
 * ============== Template Name: Home Page
 *
 * @package silverless
 */
get_header();?>

<!--HERO-->

<?php get_template_part("template-parts/hero"); ?>

<?php if( have_rows('section_link') ):
	while( have_rows('section_link') ): the_row();?>
	<div id="top_heading" class="primary_dark">
		<div class="container cols-offset-8-8">
			<div class="col">
				<?php the_sub_field('top_heading');?> <a href=""><?php the_sub_field('target_label');?></a>
			</div>
		</div>
		<div class="container cols-offset-8-8" id="heading">
			<div class="col">
				<h1 class="seperator"><?php the_sub_field('heading');?></h1>
				<div class="copy"><?php the_sub_field('copy');?></div>
				<div class="doubleButton">
					<?php if( have_rows('buttons') ):
						while( have_rows('buttons') ): the_row();
							$btnType = get_sub_field( 'style' );?>
							<a class="button <?php if( $btnType == 'Hollow' ):?>
								btn-alt
							<?php endif;?>
							" href="<?php the_sub_field('target');?>"><span><?php the_sub_field('label');?></span></a>
					<?php endwhile; endif;?>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; endif;?>

<?php if( have_rows('featured') ):
	while( have_rows('featured') ): the_row();?>
	<div id="featured" class="primary_light section">
		<div class="container">
			<div class="col">
				<span class="h6"><?php the_sub_field('title');?></span>
			</div>
		</div>
	</div>
<?php endwhile; endif;?>

<?php if( have_rows('visual') ):
	while( have_rows('visual') ): the_row();?>
	<div id="visual" class="white section">
		<div class="container cols-8-8-8">
			<div class="col">

			</div>
			<div class="col">
				<h2 class="seperator"><?php the_sub_field('title');?></h2>
				<div class="content"><?php the_sub_field('content');?></div>
				<a class="button btn-alt" href="<?php the_sub_field('button_url');?>"><span><?php the_sub_field('button_title');?></span></a>
			</div>
		</div>
	</div>
<?php endwhile; endif;?>

<?php get_footer();?>
