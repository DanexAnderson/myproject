
<!-- --------------------------- Article Images Query ------------------------ -->



<?php
if ($media_query): 

// $list = array();

foreach ($media_query->posts as $post) { 
   // $list[] = wp_get_attachment_url($post->ID);
   
   echo wp_get_attachment_image( $post->ID, 'full' );
?>
<script> alert('<?php echo wp_get_attachment_image( $post->ID, "thumbnail" ); ?>'); </script>
<div >
   <a  href="<?php echo wp_get_attachment_url($post->ID); ?>" data-toggle="lightbox" data-gallery="gallery" >
   <?php echo wp_get_attachment_image( $post->ID, array('1200', '768'), array( "class" => "img-fluid col-md-4" ) ); ?>
   </a>
   
   <div data-u="thumb" >
        <?php echo wp_get_attachment_image( $post->ID, "thumbnail", array( "class" => "img-fluid col-md-4" ) ); ?>
       <div class="ti">Slide Description</div>
   </div>
</div>
<!-- <div>
   <a  href="<?php /* bloginfo('template_url');?>/img/031.jpg" data-toggle="lightbox" data-gallery="gallery" >
       <img data-u="image" src="<?php bloginfo('template_url');?>/img/031.jpg" class="img-fluid BlowUp"/>
   </a>
   
   <div data-u="thumb" >
       <img data-u="thumb" class="i" src="<?php bloginfo('template_url'); */?>/img/031-s190x90.jpg" />
       <div class="ti">Slide Description</div>
   </div>
</div> -->

<?php
}

wp_reset_postdata();
 ?>


<?php 

else:

/* if ( have_posts() ) : while ( have_posts() ) : the_post();
 
 $attachments = get_posts( array(
     'post_type'   => 'attachment',
     'numberposts' => -1,
     'post_status' => null,
     'post_parent' => get_the_ID()
 ) );
  
 if ( $attachments ) {
     foreach ( $attachments as $attachment ) {
         ?>
         <li><?php echo wp_get_attachment_image( $attachment->ID, 'full' ); ?>
             <p><?php echo apply_filters( 'the_title', $attachment->post_title ); ?></p>
         </li>
         <?php
     }
 }
endwhile; endif; 
// wp_reset_postdata();

 */

 endif;
?>


<?php /* $query = new WP_Query( array( 'post_type' => 'gallery', 'phototype' =>'banner-slide', 'tax_query' => array( 
                            
                            array(
                                'taxonomy' => 'phototype',   // taxonomy name                                
                                 'field' => 'banner-slide',           // term_id, slug or name
                                 'terms' => 'banner-slide',                  // term id, term slug or term name
                            )
                                )
                                     ) ); */ 
?>