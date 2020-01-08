<?php
/*
// ========= Custom Taxonomies - Sector, Type ============
*/

add_action( 'init', 'sector_cpt_taxonomy', 0 );
add_action( 'init', 'type_cpt_taxonomy', 0 );

// ====== Sector
function sector_cpt_taxonomy() {
 
	$labels = array(
		'name' 				=> _x( 'Sectors', 'taxonomy general name' ),
		'singular_name' 	=> _x( 'Sector', 'taxonomy singular name' ),
		'search_items' 		=> __( 'Search Sector'   ),
		'all_items'			=> __( 'All Sectors'     ),
		'parent_item' 		=> __( 'Parent Sector'   ),
		'parent_item_colon' => __( 'Parent Sector:'  ),
		'edit_item' 		=> __( 'Edit Sector'     ), 
		'update_item' 		=> __( 'Update Sector'   ),
		'add_new_item' 		=> __( 'Add New Sector'  ),
		'new_item_name' 	=> __( 'New Sector Name' ),
		'menu_name' 		=> __( 'Sector'         )
	); 	
	
	register_taxonomy( 'sector', array( 'work', 'project' ), array(
		'hierarchical' 		=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'sector', 'hierarchical' => true )
	));
}

// ====== Type
function type_cpt_taxonomy() {
 
	$labels = array(
		'name' 				=> _x( 'Types', 'taxonomy general name' ),
		'singular_name' 	=> _x( 'Type', 'taxonomy singular name' ),
		'search_items' 		=> __( 'Search Type'   ),
		'all_items'			=> __( 'All Types'     ),
		'parent_item' 		=> __( 'Parent Type'   ),
		'parent_item_colon' => __( 'Parent Type:'  ),
		'edit_item' 		=> __( 'Edit Type'     ), 
		'update_item' 		=> __( 'Update Type'   ),
		'add_new_item' 		=> __( 'Add New Type'  ),
		'new_item_name' 	=> __( 'New Type Name' ),
		'menu_name' 		=> __( 'Type'         )
	); 	
	
	register_taxonomy( 'type', array( 'work' ), array(
		'hierarchical' 		=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'type', 'hierarchical' => true )
	));
}