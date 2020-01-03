<?php
if( get_field('type') == 'image' ):
	$heroImage = get_field('background_image');
elseif ( get_field('type') == 'color' ):
	$heroColor = get_field('colour');
endif;?>

<?php if (!is_page_template('page-templates/home.php')){?>
<section class="primary_dark">
	<div class="container cols-offset-8-16">
		<div class="col page-title">
			<h1 class="seperator_reverse"><?php the_field('title');?></h1>
		</div>
	</div>
</section>
<?php }?>

<div class="hero <?php the_field('height');?>" style="background-image: url(<?php echo $heroImage; ?>); background-color: <?php echo $heroColor; ?>;">

    <div class="container">
		<div class="col">
		    <div class="hero__content">
                <div class="inner-section">
                </div>
		    </div>
		</div>
	</div>

</div><!--hero-->