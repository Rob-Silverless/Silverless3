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
					        <div class="checkbox sectors">
					        	<label>
						        <input type="checkbox" value="<?php echo $sector->slug; ?>"/>
								<span><?php echo $sector->name; ?></span></label>
					        </div>
				        </div>
				    
				    <?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col works">
		<div class="projects">
			<?php
			    $args = array(
			      'post_type' => 'project',
				  'posts_per_page' => 8,
				  'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
				  'post__not_in' => array(get_the_ID()),
			    );
			    $project = new WP_Query( $args );
			    if( $project->have_posts() ) {
			      while( $project->have_posts() ) {
			        $project->the_post();
			        $classes = "";
				
					$sectors = get_the_terms($ID, 'sector');
					$sector_visible = "";
					foreach($sectors as $sector)
						if($sector->parent == 0)
							$classes .= " " . $sector->slug;
						else
							$sector_visible = $sector->name;
			        ?>
			        	<div class="project-container slow-fade <?php echo $classes; ?>">
			        		<?php while( have_rows('hero') ): the_row(); ?>
								<div class="project-image" style="background-image:url('<?php echo the_sub_field('background_image'); ?>')">
									<div>
										<h5><?php the_sub_field('heading'); ?></h5>
										<a href="<?php echo get_permalink($ID); ?>" class="button"><span>Find Out More</span></a>
									</div>
								</div>
							<?php endwhile; ?>
			          	</div>
			          	
			        <?php
			      }
			    }
			  ?>
		</div>

	</div>
</div>