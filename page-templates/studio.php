<?php
/**
 * ============== Template Name: Studio Page
 *
 * @package silverless
 */
get_header();?>

<?php get_template_part("template-parts/hero"); ?>

<?php if( have_rows('content') ): ?>
    	<section class="primary_dark section">
        	<div class="container cols-8-8">
        		<div class="col studio-nav">
        			<ul>
    				<?php while( have_rows('content') ): the_row(); ?>
		        		<?php if( get_row_layout() == 'section' ): ?>
							<li><a href="#"><?php the_sub_field('navigation_title'); ?></a></li>
						<?php endif; ?>
						<?php if( get_row_layout() == 'people_section' ): ?>
							<li><a href="#"><?php the_sub_field('navigation_title'); ?></a></li>
						<?php endif; ?>
					<?php endwhile; ?>
					</ul>
				</div>
				<div class="col">
					<?php while( have_rows('content') ): the_row(); ?>
						<?php if( get_row_layout() == 'section' ): ?>
							<?php if( get_sub_field('section_title')): ?>
								<h3><?php the_sub_field('section_title'); ?></h3>
							<?php endif; ?>
							<?php the_sub_field('content'); ?>
						<?php endif; ?>
						<?php if( get_row_layout() == 'people_section' ): ?>
							<?php if( get_sub_field('section_title')): ?>
								<h3><?php the_sub_field('section_title'); ?></h3>
							<?php endif; ?>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
    
<?php endif; ?>

<?php get_footer();?>