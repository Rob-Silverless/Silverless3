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
		<div class="container cols-offset-8-8 cols-xl-offset-8-12 cols-sm-24">
			<div class="col slide-left delay sm-text-center">
				<?php the_sub_field('top_heading');?> <a href=""><?php the_sub_field('target_label');?></a>
			</div>
		</div>
		<div class="container cols-offset-8-8 cols-xl-offset-8-12 cols-sm-24" id="heading">
			<div class="col">
				<h1 class="seperator"><?php the_sub_field('heading');?></h1>
				<div class="copy"><?php the_sub_field('copy');?></div>
				<div class="doubleButton sm-text-center">
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
		<div class="container cols-24">
			<div class="col">
				<span class="h6"><?php the_sub_field('title');?></span>
			</div>
		</div>
		<div class="container cols-8-16 cols-sm-24-24 grid-gap featured_container">
			<?php
				    
			    $works = get_posts(array(
		        	'post_type'     => 'work',
		        	'meta_key'		=> 'featured_work',
		        	'meta_value'	=> true
				));
			        
			    foreach($works as $work):
			    $ID = $work->ID;

			    $types = get_the_terms($ID, 'type');
				if (is_array($types) || is_object($types))
				{
					foreach($types as $type)
						$taxonomy .= "<li>" . $type->slug . "</li>";
				}
			    ?>
			    <?php while( have_rows('hero', $ID) ): the_row();?>
				    <div class="col">
				    	<div class="feature-content">
					    	<h4><?php the_sub_field('heading'); ?></h4>
					    	<div class="seperator">
					    		<?php the_sub_field('sub_heading'); ?>
					    		<a href="<?php the_permalink($ID); ?>" class="featured-image slow-fade show-sm" style="margin-top:25px; background-image:url('<?php echo the_sub_field('background_image'); ?>')"></a>
					    	</div>
					    	<ul class="taxonomy">
						    	<?php echo $taxonomy;?>
						    </ul>
						</div>
						<div class="sm-text-center">
					    	<a href="<?php the_permalink($ID); ?>" class="button"><span>Find Out More</span></a>
					    </div>
				    </div>
				    <div class="col hide-sm">
				    	<a href="<?php the_permalink($ID); ?>" class="featured-image slide-up" style="background-image:url('<?php echo the_sub_field('background_image'); ?>')"></a>
				    </div>
						
				<?php endwhile; ?>	
			<?php endforeach; ?>
		</div>
		<div class="container cols-offset-8-16 cols-sm-24 sm-text-center">
			<div class="col">
				<a href="<?php the_sub_field('featured_page'); ?>" class="button"><span>See more work</span></a>
			</div>
		</div>
	</div>
<?php endwhile; endif;?>

<?php if( have_rows('visual') ):
	while( have_rows('visual') ): the_row();?>
	<div id="visual" class="white section">
		<div class="container cols-8-8-8 cols-xl-8-12 cols-sm-24-24">
			<div class="col">

			</div>
			<div class="col">
				<h2 class="seperator"><?php the_sub_field('title');?></h2>
				<div class="content"><?php the_sub_field('content');?></div>
				<div class="sm-text-center">
					<a class="button btn-alt" href="<?php the_sub_field('button_url');?>"><span><?php the_sub_field('button_title');?></span></a>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; endif;?>

<?php get_footer();?>
