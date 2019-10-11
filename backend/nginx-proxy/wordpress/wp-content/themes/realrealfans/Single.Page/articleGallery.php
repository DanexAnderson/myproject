

<?php if ( $query->have_posts() ) :

     while ( $query->have_posts() ) : $query->the_post(); ?>

    <?php 
    
    $regex = '/src="([^"]*)"/';

    preg_match_all( $regex, get_the_content(), $matches );

    $matches = array_reverse($matches);

endwhile; endif; 
?>


<!-- --------------------------------- Header SlideShow ----------------------------------- -->
<div class=""> 

<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="8000" data-touch="true">
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

</div>

<!-- ------------------------------------------------------------------------------------------------- -->














