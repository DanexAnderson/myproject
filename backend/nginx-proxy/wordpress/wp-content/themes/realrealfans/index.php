
<?php  get_header(); ?>
<!--  -->

<div class=" index ">

		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"></h3>
					</div>
					<div class="panel-body">
						<?php if(have_posts()): ?>
						
<?php // the query to set the posts per page to 2
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('posts_per_page' => 10, 'paged' => $paged );
query_posts($args); ?>
							<?php while(have_posts()) : the_post(); ?>
								<article class="post">
									<div class="row">
										<?php if(has_post_thumbnail()): ?>
											<div class="col-md-3 ">
												<div class="post-thumbnail">
												<?php the_post_thumbnail('full', array("class" => "rounded")); ?>
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
<?php next_posts_link(); ?>
<?php previous_posts_link(); ?>
<?php else : ?>
<!-- No posts found -->



						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-md-3 ml-auto">
			
			</div>
		</div>
	</div>
	<!-- -->
<?php get_footer(); ?>
	