<?php

function registerSearch()
{ // Create custom API route

  //                      namespace       route
  register_rest_route('rrf/v1', 'search', array(

    'methods' => WP_REST_SERVER::READABLE, // wordpress get request
    'callback' => 'searchResults' // function call
  ));
}

function searchResults($data)
{


  $mainQuery = new WP_Query(array( // wordpress Query , query array 

    'post_type' =>  array('post', 'page'),  // Query entity
    's' => sanitize_text_field($data['q']), // search key 
    'posts_per_page' => 10
  ));

  $q = $data['q'];


  if (strlen($q) > 1) {
    $results = '';

    while ($mainQuery->have_posts()) {

      $mainQuery->the_post();

      if (get_post_type() == 'post' or get_post_type() == 'page') {

        $hint = get_the_title();
        $link = get_the_permalink();

        echo $hint === "" ? "No Data" : '<a class="dropdown-item py-1 list-group-item " href=' . $link . '>' . $hint . ' </a>';
        // echo '<input type="button" class="dropdown-item" type="button" value="Test1"/>';

      }
    }
  }
  return;
}
add_action('rest_api_init', 'registerSearch');


// To Exclude a Post from Search
function wpb_search_filter($query)
{
  if ($query->is_search)  // && !is_admin()
    $query->set('cat', '-23'); // remove search results for a category with cat_ID = 23

  return $query;
}
add_filter('pre_get_posts', 'wpb_search_filter');

// To Exclude all Pages from Search
add_filter('register_post_type_args', function ($args, $post_type) {
  if ($post_type == 'page') {
    $args['exclude_from_search'] = true;
  }
  return $args;
}, 10, 2);
