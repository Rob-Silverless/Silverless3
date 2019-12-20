<?php
if( get_field('type') == 'image' ):
	$heroImage = get_field('background_image');
elseif ( get_field('type') == 'color' ):
	$heroColor = get_field('colour');
endif;?>

<div class="hero <?php the_field('height');?>" style="background-image: url(<?php echo $heroImage; ?>); background-color: <?php echo $heroColor; ?>;">

    <div class="container">
		<div class="col">
		    <div class="hero__content <?php if (is_page_template('page-templates/home.php')) {?>home_hero<?php }?>">
                <div class="inner-section">
                </div>
		    </div>
		</div>
	</div>

</div><!--hero-->