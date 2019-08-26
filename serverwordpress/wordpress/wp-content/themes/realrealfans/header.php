<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
<a class="navbar-brand ml-lg-1 mr-lg-2" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!--------------- Wordpress Menu ---------------------->

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
<div class="ml-lg-5">
  <?php
	            wp_nav_menu( array(
	                'theme_location'    => 'primary',
	                'depth'             => 2,
	                'container'         => false,            
	                'menu_class'        => 'nav navbar-nav',
	                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	                'walker'            => new wp_bootstrap_navwalker())
	            );
          ?>

</div>
   <!-- ------------------------------------------------------------------------------ -->

<!--     <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
 
    </ul> -->

<!-------------------------- Search Bar ------------------------------->

    <form method="get" class="form-inline my-2 my-lg-0 ml-auto mr-lg-auto" role="search" 
    action="<?php echo esc_url(home_url('/')); ?>">

    <label for="navbar-search" class="sr-only"><?php _e('Search', 'textdomain'); ?></label>
	       <div class="form-group">
	       		<input type="text" class="form-control mr-sm-2 mr-lg-1" name="s" placeholder="Search" id="navbar-search">
         </div>
         <button type="submit" class="btn btn-outline-primary my-2 my-sm-0"><?php _e('Search', 'textdomain'); ?></button>
    <!--   <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </form>
  </div>
</nav>
<br/><br/><br/>

<div class="container-fluid pagesize">