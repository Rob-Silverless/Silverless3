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

<link rel="stylesheet" href="https://use.typekit.net/axv0hre.css"><!--TYPEKIT INJECT-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div id="page" class="site-wrapper">

        <header>
			<div class="container cols-7-15">
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
        </header>

		<main><!--closes in footer.php-->
