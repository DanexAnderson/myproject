

<?php wp_head(); get_header(); ?>
<!--  -->



<div class=" index ">
		<div class="row">
			<div class="col-md-8">
				
			<p> Showing search results for <u class="text-primary"><?php the_search_query(); ?></u> </p><br/>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"></h3>
					</div>
					<div class="panel-body">
						<?php if(have_posts()): ?>

						<?php/*  // the query to set the posts per page to 2
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('posts_per_page' => 2, 'paged' => $paged );
query_posts($args);  */?>

<?php
// Protect against arbitrary paged values
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
 
$args = array(
    'post_type' => array( 'post', 'gallery' ),
    'post_status'=>'publish',
    'posts_per_page' => 1,
    'paged' => $paged,
);
 
$the_query = new WP_Query($args);
?>
							<?php while(have_posts()) : the_post(); ?>
								<article class="post">
									<div class="row">
										<?php if(has_post_thumbnail()): ?>
											<div class="col-md-3">
												<div class="post-thumbnail">
												<?php the_post_thumbnail(); ?>
												</div>
											</div>
											<div class="col-md-9">
												<h2>
													<a href="<?php echo the_permalink(); ?>">
														<?php echo the_title(); ?>
													</a>
												</h2>

												<p class="meta">
												Posted at 
												<?php the_time(); ?> on
												<?php the_date(); ?> by
												 <strong><?php the_author(); ?></strong>
												</p>

												<div class="excerpt">
												<?php echo get_the_excerpt(); ?>
												</div>
												<br>
												<a class="btn btn-default" href="<?php the_permalink(); ?>">
												Read More &raquo;
												</a>
											</div>
										<?php else : ?>
											<div class="col-md-12">
												<h2>
													<a href="<?php echo the_permalink(); ?>">
														<?php echo the_title(); ?>
													</a>
												</h2>

												<p class="meta">
												Posted at 
												<?php the_time(); ?> on
												<?php the_date(); ?> by
												 <strong><?php the_author(); ?></strong>
												</p>

												<div class="excerpt">
												<?php echo get_the_excerpt(); ?>
												</div>
												<br>
												<a class="btn btn-default" href="<?php the_permalink(); ?>">
												Read More &raquo;
												</a>
											</div>
										<?php endif; ?>
									</div>
								</article>
							<?php endwhile; ?>

							<!-- pagination -->
<div class="pagination">
        <?php
        echo paginate_links( array(
            'format'  => 'page/%#%',
            'current' => $paged,
            'total'   => $the_query->max_num_pages,
            'mid_size'        => 2,
            'prev_text'       => __('&laquo; Prev Page'),
            'next_text'       => __('Next Page &raquo;')
        ) );
        ?>
    </div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-md-3 ml-auto">
				<?php if(is_active_sidebar('sidebar')) : ?>
					<?php dynamic_sidebar('sidebar'); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- -->
<?php get_footer(); wp_footer();?>
	