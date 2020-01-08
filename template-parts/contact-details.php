<div class="phone">
	<a href="tel:<?php the_field('phone', 'option'); ?>"><?php the_field('phone', 'option'); ?></a>
</div>
<div class="email seperator">
	<a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
</div>

<?php if (is_page_template('page-templates/contact.php')) {?>
<div class="address seperator">
	<?php the_field('address', 'option'); ?>
</div>
<?php }?>

<div class="social">
	<?php if( have_rows('social_links', 'options') ):
		while( have_rows('social_links', 'options') ): the_row(); ?>
			<a href="<?php the_sub_field('link'); ?>" title="<?php the_sub_field('social_network'); ?>"><i class="fab fa-<?php the_sub_field('social_network'); ?>"></i></a>
	<?php endwhile; endif;?>
</div>