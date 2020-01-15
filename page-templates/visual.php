<?php
/**
 * ============== Template Name: Visual Page
 *
 * @package silverless
 */
get_header();?>
<?php if( have_rows('hero') ):
	while( have_rows('hero') ): the_row();?>

<?php
if( get_field('type') == 'image' ):
	$heroImage = get_field('background_image');
elseif ( get_field('type') == 'color' ):
	$heroColor = get_field('colour');
endif;?>
<section class="visual_section">
	<div class="hero <?php the_field('height');?> slow-fade" style="background-image: url(<?php echo $heroImage; ?>); background-color: <?php echo $heroColor; ?>;">
		<div class="visual_hero">
	        <h1 class="font200 slide-up"><?php the_sub_field('heading');?></h1>
	    </div>
	</div><!--hero-->
</section>

<?php endwhile; endif;?>


<section class="visual_section">
	<div class="visual_gallery">
		<?php
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			    $args = array(
			      'post_type' => 'visual',
				  'posts_per_page' => 10,
				  'post__not_in' => array(get_the_ID()),
				  'paged' => $paged,
			    );
			    $works = new WP_Query( $args );
			    if( $works->have_posts() ) {
			      while( $works->have_posts() ) {
			        $works->the_post();
			        $classes = "";

					$visuals = get_the_terms($ID, 'visual');
					if (is_array($visuals) || is_object($visuals))
					{
						foreach($visuals as $visual)
							$classes .= " " . $visual->slug;
					}
					$image = get_field('image');
			        ?>
			        <div class="img-wrapper slow-fade <?php echo $classes; ?>" style="background-image: url(<?php echo esc_url($image['url']); ?>)">
		                <a href="<?php echo esc_url($image['url']); ?>">
		                </a>
		            </div>

			        <?php
			      }
			    }
			    wp_reset_postdata();
			  ?>
	</div>

		<div class="pagination">
		  <?php
				$big = 999999999;

				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'prev_text'          => __('<span>Previous</span>'),
					'next_text'          => __('<span>Next</span>'),
					'current' => max( 1, get_query_var('paged') ),
					'before_page_number' => '<span>',
					'after_page_number'  => '</span>',
					'total' => $works->max_num_pages
				) );
			?>
		</div>
</section>

<?php if( have_rows('design') ):
	while( have_rows('design') ): the_row();?>
	<div id="design" class="white section">
		<div class="container cols-8-8-8 cols-xl-8-12 cols-sm-24-24">
			<div class="col">

			</div>
			<div class="col">
				<?php get_template_part('inc/img/silverless');?>
				<h2 class="seperator"><?php the_sub_field('title');?></h2>
				<div class="content"><?php the_sub_field('content');?></div>
				<div class="sm-text-center">
					<a class="button btn-alt" href="<?php the_sub_field('button_url');?>"><span><?php the_sub_field('button_text');?></span></a>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; endif;?>
<?php get_footer();?>