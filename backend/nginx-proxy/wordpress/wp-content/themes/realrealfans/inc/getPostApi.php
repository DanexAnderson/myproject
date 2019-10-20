<?php


add_action( 'rest_api_init', 'custom_api_get_all_posts' );   

function custom_api_get_all_posts() {
    register_rest_route( 'custom/v1', '/all-posts', array(
        'methods' => 'GET',
        'callback' => 'custom_api_get_all_posts_callback'
    ));
}

function custom_api_get_all_posts_callback( $request ) {
    // Initialize the array that will receive the posts' data. 
    $posts_data = array();
    // Receive and set the page parameter from the $request for pagination purposes 
    // http://example.com/wp-json/custom/v1/all-posts?page=2
    $paged = $request->get_param( 'page' );
    $paged = ( isset( $paged ) || ! ( empty( $paged ) ) ) ? $paged : 1; 
    // Get the posts using the 'post' and 'news' post types
    $posts = get_posts( array(
            'paged' => $paged,
            'post__not_in' => get_option( 'sticky_posts' ),
            'posts_per_page' => 10,            
            'post_type' => array( 'post', 'gallery' ) // This is the line that allows to fetch multiple post types. 
        )
    ); 
    // Loop through the posts and push the desired data to the array we've initialized earlier in the form of an object
    foreach( $posts as $post ) {
        $id = $post->ID; 
        $post_thumbnail = ( has_post_thumbnail( $id ) ) ? get_the_post_thumbnail_url( $id ) : null;

        $posts_data[] = (object) array( 
            'id' => $id, 
            'slug' => $post->post_name, 
            'type' => $post->post_type,
            'title' => $post->post_title,
            'featured_img_src' => $post_thumbnail
        );
    }                  
    return $posts_data;                   
} 


?>