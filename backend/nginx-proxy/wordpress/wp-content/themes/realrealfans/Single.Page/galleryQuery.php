
<!-- --------------------------- Custom Query to Get Banner Images ------------------------ -->

<?php $query = new WP_Query( array( 'post_type' => 'gallery', 'phototype' =>'banner-slide', 'tax_query' => array( 
                            
                            array(
                                'taxonomy' => 'phototype',   // taxonomy name                                
                                 'field' => 'banner-slide',           // term_id, slug or name
                                 'terms' => 'banner-slide',                  // term id, term slug or term name
                            )
                                )
                                     ) ); ?>