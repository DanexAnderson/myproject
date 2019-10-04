
<!-- Testing Page for Gallery  -->

<h3> Testing Page Only for Gallery ! </h3>

<?php $query = new WP_Query( array( 'post_type' => 'gallery', 'phototype' =>'banner-slide', 'tax_query' => array( 
                            
                            array(
                                'taxonomy' => 'phototype',   // taxonomy name                                
                                 'field' => 'banner-slide',           // term_id, slug or name
                                 'terms' => 'banner-slide',                  // term id, term slug or term name
                            )
                                )
                                     ) ); ?>
<?php if ( $query->have_posts() ) :

     while ( $query->have_posts() ) : $query->the_post(); ?>

    <?php // the_post_thumbnail('thumbnail'); ?>

    <?php // echo get_the_content();
    
    $regex = '/src="([^"]*)"/';

    preg_match_all( $regex, get_the_content(), $matches );

    $matches = array_reverse($matches);


    echo '<pre>';
    // we've reversed the array, so index 0 returns the result
    print_r($matches[0]); 
   
     
    echo str_replace(get_bloginfo('url'),"",$matches[0][0] );
    
    echo '</pre>';
    
    ?>

<?php endwhile; endif;  ?>