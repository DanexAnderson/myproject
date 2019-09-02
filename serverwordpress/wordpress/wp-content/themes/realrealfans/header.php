<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-transparent fixed-top py-1">
<a class="navbar-brand ml-lg-4"  href="<?php bloginfo('url'); ?>"> <?php bloginfo('name'); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

   <ul class="navbar-nav  ml-auto">
      <li class="nav-item active ">
        <a class="nav-link" href="#">Sports <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ml-md-1 ml-lg-4">
        <a class="nav-link" href="#">Entertainment</a>
      </li>
      <li class="nav-item active dropdown ml-md-1 ml-lg-4">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
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

    <form method="get" class="form-inline my-2 my-lg-0 ml-auto mr-lg-auto "  role="search" 
    action="<?php echo esc_url(home_url('/')); ?>">

    <label for="navbar-search" class="sr-only"><?php _e('Search', 'textdomain'); ?></label>
	       <div class="form-group">
             <input type="text"  class="form-control mr-sm-2 mr-lg-1" name="s"  placeholder="Search"
             onkeyup="showResult(this.value)" id="navbar-search">
             
         </div>
         
         <button type="submit" class="btn btn-outline-light my-0 my-sm-0 searchSVG">
           <?php// _e('Search', 'textdomain'); ?></button>
        
      <ul class="list-group position-absolute  h-100 marginTop" id="livesearch"></ul>
    </form>
  </div>
</nav>
<br/><br/><br/>

<div class="container-fluid pagesize">