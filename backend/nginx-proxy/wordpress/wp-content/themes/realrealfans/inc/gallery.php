<?php
//----------------------------------------------
//--------------add theme support for thumbnails
//----------------------------------------------
if ( function_exists( 'add_theme_support')){
	add_theme_support( 'post-thumbnails' );
}
add_image_size( 'admin-list-thumb', 80, 80, true); //admin thumbnail

//----------------------------------------------
//----------register and label gallery post type
//----------------------------------------------
$gallery_labels = array(
	'name' => _x('Gallery', 'post type general name'),
	'singular_name' => _x('Gallery', 'post type singular name'),
	'add_new' => _x('Add New', 'gallery'),
	'add_new_item' => __("Add New Gallery"),
	'edit_item' => __("Edit Gallery"),
	'new_item' => __("New Gallery"),
	'view_item' => __("View Gallery"),
	'search_items' => __("Search Gallery"),
	'not_found' =>  __('No galleries found'),
	'not_found_in_trash' => __('No galleries found in Trash'), 
	'parent_item_colon' => ''
		
);
$gallery_args = array(
	'labels' => $gallery_labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'query_var' => true,
	'rewrite' => true,
	'hierarchical' => false,
	'has_archive' => true,
    'exclude_from_search' => false,
	'show_in_rest' => true,
	'menu_position' => null,
	'capability_type' => 'post',
	'supports' => array('title', 'excerpt', 'editor', 'thumbnail'),
	//'menu_icon' => get_bloginfo('template_directory') . '/images/icons/photo-album.png' //16x16 png if you want an icon
	'menu_icon' =>  'dashicons-format-image'
); 
register_post_type('gallery', $gallery_args);

//----------------------------------------------
//------------------------create custom taxonomy
//----------------------------------------------
add_action( 'init', 'jss_create_gallery_taxonomies', 0);
 
function jss_create_gallery_taxonomies(){
	register_taxonomy(
		'phototype', 'gallery', 
		array(
			'hierarchical'=> true, 
			'label' => 'Photo Types',
			'singular_label' => 'Photo Type',
			'show_in_rest' => true,
			'rewrite' => true
		)
	);	
}


//----------------------------------------------
//--------------------------admin custom columns
//----------------------------------------------
//admin_init
add_action('manage_posts_custom_column', 'jss_custom_columns');
add_filter('manage_edit-gallery_columns', 'jss_add_new_gallery_columns');
 
function jss_add_new_gallery_columns( $columns ){
	$columns = array(
		'cb'				=>		'<input type="checkbox">',
		'jss_post_thumb'	=>		'Thumbnail',
		'title'				=>		'Photo Title',
		'phototype'			=>		'Photo Type',
		'author'			=>		'Author',
		'date'				=>		'Date'
		
	);
	return $columns;
}
 
function jss_custom_columns( $column ){
	global $post;
	
	switch ($column) {
		case 'jss_post_thumb' : echo the_post_thumbnail('admin-list-thumb'); break;
		case 'description' : the_excerpt(); break;
		case 'phototype' : echo get_the_term_list( $post->ID, 'phototype', '', ', ',''); break;
	}
}
 
//add thumbnail images to column
add_filter('manage_posts_columns', 'jss_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'jss_add_post_thumbnail_column', 5);
add_filter('manage_custom_post_columns', 'jss_add_post_thumbnail_column', 5);
 
// Add the column
function jss_add_post_thumbnail_column($cols){
	$cols['jss_post_thumb'] = __('Thumbnail');
	return $cols;
}
 
function jss_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'jss_post_thumb':
      if( function_exists('the_post_thumbnail') )
        echo the_post_thumbnail( 'admin-list-thumb' );
      else
        echo 'Not supported in this theme';
      break;
  }
}

// Author Support 
function add_author_support_to_posts() {
	add_post_type_support( 'gallery', 'author' ); 
 }
 add_action( 'init', 'add_author_support_to_posts' );

?>