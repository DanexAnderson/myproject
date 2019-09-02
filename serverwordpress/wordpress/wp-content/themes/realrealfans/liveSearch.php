 
 <?php 

function registerSearch() { // Create custom API route

  //                      namespace       route
      register_rest_route('rrf/v1', 'search', array (
  
          'methods' => WP_REST_SERVER::READABLE, // wordpress get request
          'callback' => 'searchResults' // function call
      ) );
  
  }

function searchResults ($data) {

  
  $mainQuery = new WP_Query(array ( // wordpress Query , query array 

    'post_type' =>  array('post', 'page'),  // Query entity
    's' => sanitize_text_field( $data['q'] ), // search key 
    'posts_per_page' => 10
));

$q = $data['q'];


if (strlen($q) > 1)
{
  $results ='';

while($mainQuery->have_posts()) {

    $mainQuery->the_post();

    if (get_post_type() == 'post' or get_post_type() == 'page') {

          $hint = get_the_title();
          $link = get_the_permalink();
          
         echo $hint === "" ? "No Data" : '<li class="list-group-item py-1"><a href='.$link.'>'.$hint.' </a></li>';

    }

}


}

}


add_action('rest_api_init', 'registerSearch');



?>
 