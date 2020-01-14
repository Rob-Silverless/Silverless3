<?php
/**
 * Header
 *
 * @package silverless
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>

<meta charset="UTF-8">
<meta name="description" content=" ">
<meta name="keywords" content=" ">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Silverless</title>

<link rel="stylesheet" rel="preconnect" href="https://use.typekit.net/gza2yky.css" crossorigin><!--TYPEKIT INJECT-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


	<div id="page" class="site-wrapper">
        <?php get_template_part("template-parts/off-canvas"); ?>
        <header>
            <?php if (!is_page( array( 'about-us-visual', 'contact-us-visual', 'silverless-visual' ) ) ){?>
            <div id="off-canvas-open">
                <a href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
			<div class="container cols-7-15 cols-xl-24-24 font600">
        		<div class="col align-vert-c" id="logo">
            		<a href="<?php echo get_home_url(); ?>">
                       <?php get_template_part('inc/img/silverless');?>
                    </a>
            	</div>
            	<div class="col">
            		<nav id="nav">
            			<?php
                            wp_nav_menu(array(
                            'theme_location'  => 'main-menu',
                            'container_class' => 'mainMenu',
                            ));
                        ?>
            		</nav>
            	</div>
        	</div>
            <?php } else {?>
                <div id="visual_nav" class="container fullwidth cols-3-18-3">
                    <div class="col">
                        <a href="#" class="visual_dropdown">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                    <div class="visual_logo col">
                        <?php get_template_part('inc/img/silverless');?>
                    </div>
                    <div class="col visual_button">
                        <a href="#" class="button btn-alt"><span>Contact Us</span></a>
                    </div>
                    <div class="visual_menu work-filter">
                        <div class="filter-container accordion-container">
                            <div class="work-title accordion-title" data-accordion="accordion-sector">Filter Images</div>
                            <div class="accordion-content" id="accordion-sector" data-hide="false">
                                <?php
                                                        
                                    $visuals = get_terms(array(
                                        "taxonomy"   => "visual",
                                        "hide_empty" => false,
                                        "parent"     => 0,
                                        "orderby"    => "name"
                                    ));
                                    
                                    foreach ($visuals as $visual): ?>
                                    
                                    <div class="filter">
                                        <div class="checkbox sectors">
                                            <label>
                                            <input type="checkbox" value="<?php echo $visual->slug; ?>"/>
                                            <span><?php echo $visual->name; ?></span></label>
                                        </div>
                                    </div>
                                
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <?php
                            wp_nav_menu(array(
                            'theme_location'  => 'secondary-menu',
                            'container_class' => 'visualMenu',
                            ));
                        ?>
                    </div>
                </div>
            <?php }?>
        </header>

		<main><!--closes in footer.php-->
