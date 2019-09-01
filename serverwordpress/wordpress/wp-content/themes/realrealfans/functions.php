<?php
require_once('widgets/class-wp-widget-recent-posts.php');
require_once('widgets/class-wp-widget-recent-comments.php');
require_once('widgets/class-wp-widget-categories.php');

require_once('class-wp-bootstrap-navwalker.php');
require get_theme_file_path('liveSearch.php');

function load_styleCSS()
{
    // Bootstrap CSS Must load before Custom CSS 
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(),false, 'all' );
    wp_enqueue_style( 'bootstrap' );

    // Main StyleSheet, Theme Info StyleSheet
    wp_register_style('style', get_template_directory_uri() . '/style.css', array(),false, 'all' );
    wp_enqueue_style( 'style' );

    // CSS file Custom StyleSheet
    wp_register_style('CSS_style', get_template_directory_uri() . '/css/style.css', array(),false, 'all' );
    wp_enqueue_style( 'CSS_style' );
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
	
    wp_register_script('liveSearch_js', get_template_directory_uri() . '/js/liveSearch.js', '', 1, true );
    wp_enqueue_script( 'liveSearch_js' );

}

add_action('wp_enqueue_scripts', 'load_JS'); 

//----------------------------------------- --------------------------------------------------------------//


/* function thumbnail_image(){

	// Featured Image Support
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'thumbnail_image'); */


 function theme_setup(){

	// Featured Image Support
	add_theme_support('post-thumbnails');

	// Nav Menus
	register_nav_menus(array(
		'primary' => __('Primary Menu')
	));
}
add_action('after_setup_theme', 'theme_setup'); 


// Widget Locations
function init_widgets($id){
	register_sidebar(array(  // add side bar to widgets
		'name' 	=> 'Sidebar',
		'id'	=> 'sidebar',
		'before_widget'	=> '<div class="panel panel-default">', // renders before the widget loads 
		'after_widget'	=> '</div></div>',                      // renders after the widget loads 
		'before_title'	=> '<div class="panel-heading"><h3 class="panel-title">', // renders before the title loads
		'after_title'	=> '</h3></div><div class="panel-body">'                  // renders after the title loads 
	));
}
add_action('widgets_init', 'init_widgets');

// Adds 'list-group-item' to categories li
function add_new_class_list_categories($list){
	$list = str_replace('cat-item', 'cat-item list-group-item', $list);
	return $list;
}  
add_filter('wp_list_categories', 'add_new_class_list_categories');

// Register Widgets
function wordstrap_register_widgets(){
	register_widget('WP_Widget_Recent_Posts_Custom');
	register_widget('WP_Widget_Recent_Comments_Custom');
	register_widget('WP_Widget_Categories_Custom');
}

add_action('widgets_init','wordstrap_register_widgets');




// Add Comments
function add_theme_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li class="well comment-item"';
		$add_below = 'div-comment';
	}
?>

<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>

	<div class="col-md-2">
		<div class="comment-author vcard">
			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			<?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
		</div>
	</div>

	<div class="col-md-10">
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
			?>
		</div>

		<?php comment_text(); ?>

		<div class="reply">
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>

	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}