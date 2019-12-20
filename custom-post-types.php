<?php
/*
// ========= Custom Post Types - Case Studies ============
*/

add_action( 'init', 'custom_post_type_case_studies', 0 );

// ====== Camps
function custom_post_type_case_studies() {

    $labels = array(
        'name'                => _x( 'Case Studies', 'Post Type General Name',  'silverless' ),
        'singular_name'       => _x( 'Case Study',  'Post Type Singular Name', 'silverless' ),
        'menu_name'           => __( 'Case Study',         'silverless' ),
        'parent_item_colon'   => __( 'Parent Case Study',  'silverless' ),
        'all_items'           => __( 'All Case Studies',   'silverless' ),
        'view_item'           => __( 'View Case Study',    'silverless' ),
        'add_new_item'        => __( 'Add New Case Study', 'silverless' ),
        'add_new'             => __( 'Add Case Study',     'silverless' ),
        'edit_item'           => __( 'Edit Case Study',    'silverless' ),
        'update_item'         => __( 'Update Case Study',  'silverless' ),
        'search_items'        => __( 'Search Case Study',  'silverless' ),
        'not_found'           => __( 'Not Found',          'silverless' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'silverless' )
    );
    
    $args = array(
        'label'               => __( 'case_studies', 'silverless' ),
        'description'         => __( 'Case Study', 'silverless' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail' ),
        'menu_icon'           => 'dashicons-index-card',
        'hierarchical'        => false,
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
    
    register_post_type( 'case_studies', $args );
}