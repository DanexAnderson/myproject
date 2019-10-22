<?php 

function registerGetPostApi() {
    register_rest_route( 'rrf/v1', '/getposts', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'getPosts'
    ));
}

add_action('rest_api_init', function(){header("Access-Control-Allow-Origin: *");});

function getPosts( $request ) {
    // Initialize the array that will receive the posts' data. 
    $posts_data = array();
    // Receive and set the page parameter from the $request for pagination purposes 
    // http://example.com/wp-json/custom/v1/all-posts?page=2
    $paged = $request->get_param( 'page' );
    $paged = ( isset( $paged ) || ! ( empty( $paged ) ) ) ? $paged : 1; 
    // Get the posts using the 'post' and 'news' post types
    $post_per_page = 10;
    $posts = get_posts( array(
            'paged' => $paged,
            'post__not_in' => get_option( 'sticky_posts' ),
            'posts_per_page' => $post_per_page,            
            'post_type' => array( 'post', 'gallery' ), // This is the line that allows to fetch multiple post types. 
            'tax_query' =>          array( array(
                'taxonomy' => 'phototype',
                'field' => 'name',
                'terms' => 'hidden',
                'operator' => 'NOT IN',
            ))
        )
    ); 
    // Loop through the posts and push the desired data to the array we've initialized earlier in the form of an object
    foreach( $posts as $post ) {
        $id = $post->ID; 
        $post_thumbnail = ( has_post_thumbnail( $id ) ) ? get_the_post_thumbnail_url( $id ) : null;

        $posts_data[] = (object) array( 
            'id' => $id, 
            'author' => $post->post_author,
            'slug' => $post->post_name, 
            'type' => $post->post_type,
            'title' => $post->post_title,
            'featured_img_src' => $post_thumbnail,
            'date' => $post->post_date,
            'excerpt' => empty($post->post_excerpt)? wp_trim_words( $post->post_content, 60, '...' ):"",
            
        );
    }   
    
    //  Add Post_types Posts plus Gallery divided by post per page = totalpages
    $totalPosts = (wp_count_posts('post')->publish + wp_count_posts('gallery')->publish);
    $totalPages = ceil( $totalPosts / $post_per_page);
    
    $response = rest_ensure_response( $posts_data );

    $response->header( 'X-WP-Total', (int) $totalPosts );
    $response->header( 'X-WP-TotalPages', (int) $totalPages );

    return $response;                   
} 
add_action( 'rest_api_init', 'registerGetPostApi' ); 

?>