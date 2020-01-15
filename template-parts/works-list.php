<div class="container cols-8-16 cols-sm-24-24">
	<div class="col work-filter stickyContainer hide-sm">
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
					        <div class="checkbox sectors">
					        	<label>
						        <input type="checkbox" value="<?php echo $sector->slug; ?>"/>
								<span><?php echo $sector->name; ?></span></label>
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
					        <div class="checkbox types">
					        	<label>
						        <input type="checkbox" value="<?php echo $type->slug; ?>"/>
								<span><?php echo $type->name; ?></span></label>
					        </div>
				        </div>
				    
				    <?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col works">
		<div class="container cols-12-12 cols-md-24-24 grid-gap">
			<?php
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			    $args = array(
			      'post_type' => 'work',
				  'posts_per_page' => 4,
				  'paged' => $paged,
				  'post__not_in' => array(get_the_ID())
			    );
			    $works = new WP_Query( $args );
			    if( $works->have_posts() ) {
			      while( $works->have_posts() ) {
			        $works->the_post();
			        $classes = "";
				
					$sectors = get_the_terms($ID, 'sector');
					$sector_visible = "";
					foreach($sectors as $sector)
						if($sector->parent == 0)
							$classes .= " " . $sector->slug;
						else
							$sector_visible = $sector->name;
					
					$types = get_the_terms($ID, 'type');
					if (is_array($types) || is_object($types))
					{
						foreach($types as $type)
							$classes .= " " . $type->slug;
					}
			        ?>
			        	<div class="col works-container <?php echo $classes; ?>">
			        		<?php while( have_rows('hero') ): the_row();
								$currentRow = get_row_index(); ?>
								<a href="<?php echo get_permalink($ID); ?>">
									<div class="work-image slow-fade" style="background-image:url('<?php echo the_sub_field('background_image'); ?>')"></div>
									<div class="seperator_reverse work-title"><h5><?php the_sub_field('heading'); ?></h5></div>
									<div><?php the_sub_field('sub_heading'); ?></div>
								</a>
							<?php endwhile; ?>
			          	</div>
			        <?php
			      }
			    }
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
	</div>
</div>