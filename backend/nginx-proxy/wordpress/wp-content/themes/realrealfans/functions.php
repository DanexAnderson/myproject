<?php

require_once('inc/gallery.php');
require_once('inc/livesearch.php');
require_once('inc/createPostApi.php');
require_once('inc/getPostApi.php');

function load_styleCSS()
{
    $rand = rand( 1, 99999999999 ); // To Prevent website from Caching CSS

    // Bootstrap CSS Must load before Custom CSS 
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(),$rand, 'all' );
    wp_enqueue_style( 'bootstrap' );

    // Main StyleSheet, Theme Info StyleSheet
    wp_register_style('style', get_template_directory_uri() . '/style.css', array(),$rand, 'all' );
    wp_enqueue_style( 'style' );

    // CSS file Custom StyleSheet
    wp_register_style('CSS_style', get_template_directory_uri() . '/css/style.css', array(),$rand, 'all' );
    wp_enqueue_style( 'CSS_style' );
}

add_action('wp_enqueue_scripts', 'load_styleCSS'); 


// Jquery Must be load Custom JS and bootstrap JS code
function include_Jquery() {

    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery3.4.1.min.js', '', 1, true );

    wp_register_script('jssor_slider', get_template_directory_uri() . '/js/jssor.slider-27.5.0.min.js', '', 1, false );
    wp_enqueue_script( 'jssor_slider' );

    wp_register_script('light_box', get_template_directory_uri() . '/js/ekko-lightbox.min.js', '', 1, true );
    wp_enqueue_script( 'light_box' );
}

add_action('wp_enqueue_scripts', 'include_Jquery');



function load_JS()
{

    wp_register_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', '', 1, true );
    wp_enqueue_script( 'bootstrap_js' );

    wp_register_script('custom_js', get_template_directory_uri() . '/js/custom.js', '', 1, true );
	wp_enqueue_script( 'custom_js' );
	
    wp_register_script('liveSearch_js', get_template_directory_uri() . '/js/liveSearch.js', '', 1, true );
    wp_enqueue_script( 'liveSearch_js' );

    wp_register_script('gallerySlide_js', get_template_directory_uri() . '/js/gallerySlide.js', '', 1, false );
    wp_enqueue_script( 'gallerySlide_js' );


}

add_action('wp_enqueue_scripts', 'load_JS'); 



//----------------------------------------- --------------------------------------------------------------//

// Enable Api Headers
function my_customize_rest_cors() {
	remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
	add_filter( 'rest_pre_serve_request', function( $value ) {
		header( 'Access-Control-Allow-Origin: *' );
        header( 'Access-Control-Allow-Headers: *' );
		header( 'Access-Control-Allow-Methods: OPTIONS, GET, POST, PUT, PATCH, DELETE' );
		header( 'Access-Control-Allow-Credentials: true' );
		header( 'Access-Control-Expose-Headers: Link', false );
		return $value;
	} );
}
add_action( 'rest_api_init', 'my_customize_rest_cors', 15 );

// ----------------------------------------------------------------------------------------------------- //


// Allowed Mime Types 
function free_wp_tp_enable_extended_upload ( $mime_types =array() ) {
  
    // The MIME types listed here will be allowed in the media library.
    // You can add as many MIME types as you want.
    $mime_types['jpeg']  = 'image/jpeg';
    $mime_types['jpe']  = 'image/jpeg';
    $mime_types['jpg']  = 'image/jpg';
    $mime_types['png']  = 'image/png';
    $mime_types['gif']  = 'image/gif';
   
    // If you want to forbid specific file types which are otherwise allowed,
    // specify them here.  You can add as many as possible.
    unset( $mime_types['bin'] );
   
    return $mime_types;
 }   
 add_filter('upload_mimes', 'free_wp_tp_enable_extended_upload');

 

// Remove Wordpress Image Sizes
add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );
// Remove default image sizes here. 
function prefix_remove_default_images( $sizes ) {
 unset( $sizes['small']); // 150px
 unset( $sizes['medium']); // 300px
 unset( $sizes['large']); // 1024px
 unset( $sizes['medium_large']); // 768px
 return $sizes;
}


// Stop Empty Search Query 
add_action( 'pre_get_posts', function ( $q )
{
    if(    //!is_admin() && // Only target the front end
     $q->is_main_query() // Only target the main query
        && $q->is_search() // Only target the search page
    ) {
        // Get the search terms        
        $search_terms = $q->get( 's' );

        // Set a 404 if s is empty
        if ( empty(trim($search_terms)) ) {
            
            add_action( 'wp', function () use ( $q )
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                // header('Location: '.$_SERVER['PHP_SELF']);
                 die;
                $q->set_404();

                status_header(404);
                nocache_headers();
                
            });
        }
    }
});


































/* 
 function thumbnail_image(){

	// Featured Image Support
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'thumbnail_image');  */


// add_theme_support( 'right-size');

// add_image_size( 'right-size', 1024, 500, false );

// update_option( 'medium_large_size_h', 500 );


?>
