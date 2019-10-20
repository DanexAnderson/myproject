<?php

function registerPost()
{ // Create custom API route

  //                      namespace       route
  register_rest_route('rrf/v1', 'createpost', array(

    'methods' => WP_REST_SERVER::EDITABLE, // wordpress get request
    'callback' => 'createPost' // function call
  ));
}

add_action('rest_api_init', function(){header("Access-Control-Allow-Origin: *");});

function createPost($data)
{

  $user_id = get_current_user_id();

   // Create New Post

  if( isset( $_POST["post_title"] )):
  $new_post = array(
    'post_title'    => $_POST["post_title"],
    'post_content'  => $_POST["content"]?$_POST["content"]:"",
    'post_status'   => 'publish',
    'post_type'     => 'post',
    'post_author'   => $user_id
);
$post_id = wp_insert_post($new_post);

endif;

    // Image Upload 
    if( isset( $_FILES['file'] ) ):

  require_once( ABSPATH . 'wp-admin/includes/image.php' );
  require_once( ABSPATH . 'wp-admin/includes/file.php' );
  require_once( ABSPATH . 'wp-admin/includes/media.php' );

	$attachment = array(  
		"post_title" => $_POST["media_title"]?$_POST["media_title"]:"",
		"post_content" => $_POST["description"]?$_POST["description"]:"",
    "post_parent" => $post_id,
		"post_author" => $user_id,
  );
  
$image_id = media_handle_upload( 'file', $post_id , $attachment, array( 'test_form' => false ));


    //  Set Featureed Image for Post
    set_post_thumbnail( $post_id, $image_id ); 

    // Publish the Post 
    // wp_publish_post( $post_id );

  endif;    
   return 'Successful Post';
}
add_action('rest_api_init', 'registerPost');