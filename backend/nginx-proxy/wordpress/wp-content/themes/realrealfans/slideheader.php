
<!-- --------------------------- Custom Query to Get Banner Images ------------------------ -->

<?php $query = new WP_Query( array( 'post_type' => 'gallery', 'phototype' =>'hidden' ) );?>
<?php if ( $query->have_posts() ) :

     while ( $query->have_posts() ) : $query->the_post(); ?>

    <?php 
    
    $regex = '/src="([^"]*)"/';

    preg_match_all( $regex, get_the_content(), $matches );

    $matches = array_reverse($matches);

endwhile; endif; 
wp_reset_postdata();
?>

<!-- --------------------------------- Header SlideShow ----------------------------------- -->
  <?php if ($matches): ?>

<div class=""> 

<div id="carouselExampleIndicators" class="carousel slide carousel-fade " data-ride="carousel" 
data-interval="9000" data-touch="true">

<!-- Indicator controllers  -->
  <ol class="carousel-indicators mb-1">

<?php for($i=0; $i<count($matches[0]); $i++):?>

    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>"
     class="<?php echo $i==0? 'active':''; ?>"></li>
   <?php endfor; ?> 
 
  </ol>

  <!-- Slider Images  -->
  <div class="carousel-inner "  >

<?php $i=0;  foreach($matches[0] as $src):?>

    <div class="carousel-item <?php echo $i==0? 'active':''; ?>" >
      <img class="d-block w-100" style="height: 200px"  src="<?php  echo $src ?>" alt="First slide">
    </div>


<?php   $i++; endforeach;  endif; ?>

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


<!--     <div class="carousel-item">
      <img class="d-block w-100" style="height: 200px" src="<?php/* echo $matches[0][1]; ?>" alt="Second slide">
    </div>
    <div class="carousel-item " >
      <img class="d-block w-100"  style="height: 200px"  src="<?php  echo $matches[0][2]; ?>" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 " style="height: 200px"   src="<?php echo $matches[0][3]; */?>" alt="Fouth slide">
      
    </div> -->


    <!--     <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li> -->