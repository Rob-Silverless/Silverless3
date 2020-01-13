<div id="off-canvas-backdrop"></div>
<div id="off-canvas">
    <a href="" id="off-canvas-close">
        <i class="fas fa-times"></i>
    </a>
    <div class="logo-container">
        <a href="<?php echo get_home_url(); ?>">
           <?php get_template_part('inc/img/silverless');?>
        </a>
    </div>
    <nav id="off-canvas-menu-container">
        <?php
            wp_nav_menu(array(
            'theme_location'  => 'main-menu',
            'container_class' => 'off-canvas-menu',
            ));
        ?>
    </nav>
    <?php get_template_part("template-parts/contact-details"); ?>
</div>