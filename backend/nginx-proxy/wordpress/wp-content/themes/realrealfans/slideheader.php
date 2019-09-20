
<!-- --------------------------- Custom Query to Get Banner Images ------------------------ -->

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

    <?php 
    
    $regex = '/src="([^"]*)"/';

    preg_match_all( $regex, get_the_content(), $matches );

    $matches = array_reverse($matches);

endwhile; endif; 
?>


<!-- --------------------------------- Header SlideShow ----------------------------------- -->

<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="8000">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner "  >
    <div class="carousel-item active" >
      <img class="d-block w-100 h-25"   src="<?php  echo $matches[0][0]; ?>" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-25" src="<?php echo $matches[0][1]; ?>" alt="Second slide">
    </div>
    <div class="carousel-item " >
      <img class="d-block w-100 h-25"   src="<?php  echo $matches[0][2]; ?>" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-25" src="<?php echo $matches[0][3]; ?>" alt="Fouth slide">
    </div>

  </div>
  
</div>

<!-- ------------------------------------------------------------------------------------------------- -->






















<!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a> -->