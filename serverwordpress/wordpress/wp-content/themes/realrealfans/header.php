<html <?php language_attributes(); ?> >
<?php wp_head(); ?>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
</head>

<body> 
  
<?php include('slideheader.php'); ?>
    
<nav class="navbar navbar-expand-md navbar-light NavbgColor py-md-0 mt-md-n1 mt-lg-0 fixed-top py-lg-1">
<a class="navbar-brand ml-lg-4 my-0 shadow-sm pr-2 pl-2"  href="<?php bloginfo('url'); ?>"> <?php bloginfo('name'); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

   <ul class="navbar-nav  ml-auto ">
    <!--   <li class="nav-item active ">
        <a class="nav-link NavtextColor" href="#">Sports <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ml-md-1 ml-lg-4">
        <a class="nav-link NavtextColor" href="#">Entertainment</a>
      </li> -->
      <li class="nav-item active dropdown ">
        <a class="nav-link dropdown-toggle NavtextColor border shadow my-2 py-0 rounded" href="#" id="navbarDropdown" role="button"
         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Sports
        </a>
        <div class="dropdown-menu bg-info main-navigation" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">FootBall</a>
          <a class="dropdown-item" href="#">American FootBall</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">BasketBall</a>
          <a class="dropdown-item" href="#">Other Sports</a>
        </div>
      </li>
      <li class="nav-item active dropdown ml-md-1 ml-lg-4">
        <a class="nav-link dropdown-toggle NavtextColor border shadow my-2 py-0 rounded" href="#" id="navbarDropdown" role="button"
         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Entertainment
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item active dropdown ml-md-1 ml-lg-4">
        <a class="nav-link dropdown-toggle NavtextColor border shadow my-2 py-0 rounded" href="#" id="navbarDropdown" role="button"
         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Technology
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
 
    </ul> 

<!-------------------------- Search Bar ------------------------------->

    <form method="get" class="form-inline my-2 my-lg-0 ml-auto mr-lg-auto shadow border"  role="search" 
    action="<?php echo esc_url(home_url('/')); ?>">

    <label for="navbar-search" class="sr-only"><?php _e('Search', 'textdomain'); ?></label>
	       <div class="form-group">
             <input type="text"  class="form-control mr-sm-2 mr-lg-1" name="s"  placeholder="Search"
             onkeyup="showResult(this.value)" id="navbar-search">
             
         </div>
         
         <button type="submit" class="btn btn-outline-none my-0 my-sm-0 searchSVG ">
           </button>
        
      <ul class="list-group position-absolute  h-100 marginTop" id="livesearch"></ul>
    </form>
  </div>
</nav>
<br/><br/><br/>

<div class="container-fluid pagesize">
