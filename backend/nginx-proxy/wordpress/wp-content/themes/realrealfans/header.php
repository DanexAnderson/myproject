<html <?php language_attributes(); ?> >
<?php wp_head(); ?>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
</head>

<body> 
  <!-- ------------- Slide header Banner --------- -->
<?php include('slideheader.php'); ?>
    
<nav class="navbar navbar-expand-md navbar-light NavbgColor py-0 mt-md-n1 mt-lg-0 fixed-top py-lg-1">
<a class="navbar-brand ml-lg-4 my-0 shadow-sm pr-2 pl-2 ml-md-n2"  href="<?php bloginfo('url'); ?>"> <?php bloginfo('name'); ?></a>
  <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon "></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

   <ul class="navbar-nav  ml-auto mr-auto ">
    <!--   <li class="nav-item active ">
        <a class="nav-link NavtextColor" href="#">Sports <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ml-md-1 ml-lg-4">
        <a class="nav-link NavtextColor" href="#">Entertainment</a>
      </li> -->
      <li class="nav-item active dropdown ">
        <a class="nav-link dropdown-toggle NavtextColor border shadow my-2 py-0 rounded text-center " href="#" id="navbarDropdown" role="button"
         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Sports
        </a>
        <div class="dropdown-menu shadow-lg rounded border main-navigation py-0" aria-labelledby="navbarDropdown">
          <a class="dropdown-item py-0 my-2 " href="#"><div class=" soccerSVG "> <span class="ml-4 pl-3"> Football</span></div></a>
          <hr class="NavHr"/>
          <a class="dropdown-item my-2" href="#"><div class=" footballSVG "> <span class="ml-4 pl-3">American Football</span></div></a>
          <hr class="NavHr"/>
          <a class="dropdown-item my-2" href="#"><div class=" basketballSVG "> <span class="ml-4 pl-3">BasketBall</span></div></a>
          <hr class="NavHr"/>
          <a class="dropdown-item my-2" href="#"><div class=" sportsSVG "> <span class="ml-4 pl-3">Other Sports</span></div></a>
        </div>
      </li>
      <li class="nav-item active dropdown ml-md-1 ml-lg-4  ">
        <a class="nav-link dropdown-toggle NavtextColor border shadow my-2 py-0 rounded text-center " href="#" id="navbarDropdown" role="button"
         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Entertainment
        </a>
        <div class="dropdown-menu shadow-lg rounded border main-navigation py-0" aria-labelledby="navbarDropdown">
          <a class="dropdown-item py-0 my-2" href="#"><div class=" musicSVG "> <span class="ml-4 pl-3">Music</span></div></a>
          <hr class="NavHr"/>
          <a class="dropdown-item my-2" href="#"><div class=" movieSVG "> <span class="ml-4 pl-3">Movies</span></div></a>
          <hr class="NavHr"/>
          <a class="dropdown-item my-2" href="#"><div class=" tvSVG "> <span class="ml-4 pl-3">TV Series</span></div></a>
          <hr class="NavHr"/>
          <a class="dropdown-item my-2" href="#"><div class=" animeSVG "> <span class="ml-4 pl-3">Anime</span></div></a>
        </div>
      </li>
      <li class="nav-item active dropdown ml-md-1 ml-lg-4 ">
        <a class="nav-link dropdown-toggle NavtextColor border shadow my-2 py-0 text-center rounded" href="#" id="navbarDropdown" role="button"
         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Technology
        </a>
        <div class="dropdown-menu shadow-lg rounded border main-navigation py-0" aria-labelledby="navbarDropdown">
          <a class="dropdown-item py-0 my-2" href="#"><div class=" newreleaseSVG "> <span class="ml-4 pl-3">New Releases</span></div></a>
          <hr class="NavHr"/>
          <a class="dropdown-item my-2" href="#"><div class=" fixSVG "> <span class="ml-4 pl-3">Tech Fix</span></div></a>
          <hr class="NavHr"/>
          <a class="dropdown-item my-2" href="#"><div class=" downloadsSVG "> <span class="ml-4 pl-3">Downloads</span></div></a>
          <hr class="NavHr"/>
          <a class="dropdown-item my-2" href="#"><div class=" qaSVG "> <span class="ml-4 pl-3">Q & A</span></div></a>
        </div>
      </li>
 
    </ul> 

<!-------------------------- Search Bar ------------------------------->


    <form method="get" id="searchForm" class="form-inline my-0 my-md-1 my-lg-0 ml-md-1 ml-lg-auto mr-lg-auto shadow border rounded " role="search" 
    action="<?php echo esc_url(home_url('/')); ?>">

    <label for="navbar-search" class="sr-only"><?php _e('Search', 'textdomain'); ?></label>

	       <div class="form-group mr-3 mr-md-0 searchInput">
           
             <input type="text"  class="form-control  ml-2 ml-md-auto mr-lg-1 mt-3 mt-md-0 " name="s"  placeholder="Search"
              id="navbar-search" value="" >
              <!-- onkeyup="showResult(this.value)" -->

             <!-- DropDown Live Search Menu Results -->
           <div class=" position-absolute  h-100 liveSearchMenu " id="livesearch" ></div> 
         </div>
            <button type="submit" class="btn btn-outline-none my-0 mt-md-0  d-lg-block searchSVG ">
           </button>

      
      

    </form>    


  </div>
</nav>
<br/><br/><br/>

<div class="container-fluid pagesize">

