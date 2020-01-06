<?php
/*
// ========= Custom Post Types ============
*/

add_action( 'init', 'custom_post_type_work', 0 );

// ====== Works
function custom_post_type_work() {

    $labels = array(
        'name'                => _x( 'Works', 'Post Type General Name',  'silverless' ),
        'singular_name'       => _x( 'Work',  'Post Type Singular Name', 'silverless' ),
        'menu_name'           => __( 'Works',         'silverless' ),
        'parent_item_colon'   => __( 'Parent Work',  'silverless' ),
        'all_items'           => __( 'All Works',   'silverless' ),
        'view_item'           => __( 'View Work',    'silverless' ),
        'add_new_item'        => __( 'Add New Work', 'silverless' ),
        'add_new'             => __( 'Add Work',     'silverless' ),
        'edit_item'           => __( 'Edit Work',    'silverless' ),
        'update_item'         => __( 'Update Work',  'silverless' ),
        'search_items'        => __( 'Search Work',  'silverless' ),
        'not_found'           => __( 'Not Found',          'silverless' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'silverless' )
    );
    
    $args = array(
        'label'               => __( 'work', 'silverless' ),
        'description'         => __( 'work', 'silverless' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies', 'page-attributes' ),
        'taxonomies'          => array( 'work' ),
        'menu_icon'           => 'dashicons-admin-customizer',
        'hierarchical'        => false,
        'menu_position'       => 110,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    
    register_post_type( 'work', $args );
}