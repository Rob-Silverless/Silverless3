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
        	<div class="container cols-8-16">
        		<div class="col studio-nav stickyContainer">
        			<ul class="sticky">
    				<?php while( have_rows('content') ): the_row(); ?>
		        		<?php if( get_row_layout() == 'section' ): ?>
							<li><a href="#studio-<?php echo get_row_index(); ?>" class="explore"><?php the_sub_field('navigation_title'); ?></a></li>
						<?php endif; ?>
						<?php if( get_row_layout() == 'people_section' ): ?>
							<li><a href="#studio-<?php echo get_row_index(); ?>" class="explore"><?php the_sub_field('navigation_title'); ?></a></li>
						<?php endif; ?>
					<?php endwhile; ?>
					</ul>
				</div>
				<div class="col">
					<?php while( have_rows('content') ): the_row();
						$currentRow = get_row_index(); ?>
						<?php if( get_row_layout() == 'section' ): ?>
							<div class="studio-content content" id="studio-<?php echo get_row_index(); ?>">
								<?php if( get_sub_field('section_title')): ?>
									<h3><?php the_sub_field('section_title'); ?></h3>
								<?php endif; ?>
								<?php the_sub_field('content'); ?>
								<div class="accordion-container">
									<?php if( have_rows('accordion') ): ?>
										<?php while( have_rows('accordion') ): the_row(); ?>
											<div>
												<div class="accordion-title" data-accordion="accordion-<?php echo get_row_index(); ?>-<?php echo $currentRow; ?>">
													<?php the_sub_field('title'); ?>
												</div>
												<div class="accordion-content" id="accordion-<?php echo get_row_index(); ?>-<?php echo $currentRow; ?>" data-hide="true">
													<?php the_sub_field('content'); ?>
												</div>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
						<?php if( get_row_layout() == 'people_section' ): ?>
							<?php if( get_sub_field('section_title')): ?>
								<div class="studio-content" id="studio-<?php echo get_row_index(); ?>">
									<h3><?php the_sub_field('section_title'); ?></h3>
									<div class="container cols-8-8-8 grid-gap profile-details">
									<?php if( have_rows('person') ): ?>
										<?php while( have_rows('person') ): the_row(); ?>
											<div class="col">
												<div class="profile-image slow-fade" style="background-image:url('<?php echo the_sub_field('image'); ?>')"></div>
												<div class="name"><?php the_sub_field('name'); ?></div>
												<div class="role"><?php the_sub_field('post_title'); ?></div>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
    
<?php endif; ?>

<?php if( have_rows('visual') ):
	while( have_rows('visual') ): the_row();?>
<section class="white section" id="visual">
	<div class="container cols-8-8-8">
		<div class="col">

		</div>
		<div class="col">
			<h2 class="seperator"><?php the_sub_field('title');?></h2>
			<div class="content"><?php the_sub_field('content');?></div>
			<a class="button btn-alt" href="<?php the_sub_field('button_url');?>"><span><?php the_sub_field('button_title');?></span></a>
		</div>
	</div>
</section>
<?php endwhile; endif;?>

<?php get_footer();?>