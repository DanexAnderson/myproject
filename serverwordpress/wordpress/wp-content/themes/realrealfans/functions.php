<?php

function load_styleCSS()
{
    // Bootstrap CSS Must load before Custom CSS 
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(),false, 'all' );
    wp_enqueue_style( 'bootstrap' );

    wp_register_style('style', get_template_directory_uri() . '/style.css', array(),false, 'all' );
    wp_enqueue_style( 'style' );
}

add_action('wp_enqueue_scripts', 'load_styleCSS');


// Jquery Must be load Custom JS and bootstrap JS code
function include_Jquery() {

    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery3.4.1.min.js', '', 1, true );
   // add_action('wp_enqueue_scripts', 'jquery'); 
}

add_action('wp_enqueue_scripts', 'include_Jquery'); 



function load_JS()
{

    wp_register_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', '', 1, true );
    wp_enqueue_script( 'bootstrap_js' );

    wp_register_script('custom_js', get_template_directory_uri() . '/js/custom.js', '', 1, true );
    wp_enqueue_script( 'custom_js' );

}

add_action('wp_enqueue_scripts', 'load_JS'); 


