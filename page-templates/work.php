<?php
/**
 * ============== Template Name: Work Page
 *
 * @package silverless
 */
get_header();?>

<?php get_template_part("template-parts/hero"); ?>

<section class="primary_dark section">
	<div class="container cols-8-16">
		<div class="col work-filter stickyContainer">
			<div class="sticky">
				<div class="filter-container accordion-container">
					<div class="work-title accordion-title" data-accordion="accordion-sector">Filter By Sector</div>
					<div class="accordion-content" id="accordion-sector" data-hide="false">
						<?php
											    
						    $sectors = get_terms(array(
							    "taxonomy"   => "sector",
							    "hide_empty" => false,
							    "parent"     => 0,
							    "orderby"    => "name"
							));
						    
						    foreach ($sectors as $sector): ?>
						    
						    <div class="filter">
						        <div class="checkbox">
						        	<label>
							        <input type="checkbox" value="<?php echo $sector->slug; ?>"/>
									<?php echo $sector->name; ?></label>
						        </div>
					        </div>
					    
					    <?php endforeach; ?>
					</div>
				</div>
				<div class="filter-container">
				    <div class="work-title accordion-title" data-accordion="accordion-type">Filter By Type</div>
				    <div class="accordion-content" id="accordion-type" data-hide="false">
					    <?php
											    
						    $types = get_terms(array(
							    "taxonomy"   => "type",
							    "hide_empty" => false,
							    "parent"     => 0,
							    "orderby"    => "name"
							));
						    
						    foreach ($types as $type): ?>
						    
						    <div class="filter">
						        <div class="checkbox">
						        	<label>
							        <input type="checkbox" value="<?php echo $type->slug; ?>"/>
									<?php echo $type->name; ?></label>
						        </div>
					        </div>
					    
					    <?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col works">
			<div class="container cols-12-12 grid-gap">
				<?php
				    $args = array(
				      'post_type' => 'work',
				      'tax_query' => array(
				      	'relation' => 'OR',
				        array(
				          'taxonomy' => 'sector',
				          'field' => 'slug',
				          'terms' => 'travel'
				        ),
				        array(
				          'taxonomy' => 'type',
				          'field' => 'slug',
				          'terms' => 'app'
				        )
				      )
				    );
				    $works = new WP_Query( $args );
				    if( $works->have_posts() ) {
				      while( $works->have_posts() ) {
				        $works->the_post();
				        ?>
				        	<div class="col">
				        		<?php while( have_rows('hero') ): the_row();
									$currentRow = get_row_index(); ?>
									<div class="work-image" style="background-image:url('<?php echo the_sub_field('background_image'); ?>')"></div>
									<div class="seperator_reverse work-title"><h5><?php the_sub_field('heading'); ?></h5></div>
									<div><?php the_sub_field('sub_heading'); ?></div>
								<?php endwhile; ?>
				          	</div>
				        <?php
				      }
				    }
				  ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer();?>