
<?php get_header(); ?>

<!--  -->

<div class=" index">
		<div class="row">
			<div class="col-md-9">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<?php if(have_posts()): ?>
							<?php while(have_posts()) : the_post(); ?>
								<article class="post">
									<div class="row">					
										<div class="col-md-12">
											<h2>
												<span href="<?php // echo the_permalink(); ?>">
													<?php echo the_title(); ?>
												</span>
											</h2>

											<!-- Gallery -->

<?php include('single-page-gallery.php'); ?>

<!-- -------- -->

											<!-- Check For Thumbnail -->
										<?php if(has_post_thumbnail()): ?>
											<!-- Display Thumbnail / Featured Image -->
											<div class="post-thumbnail">
												<?php the_post_thumbnail(); ?>
											</div>
										<?php endif; ?>										
											<br>

											<p class="meta">
												Posted at 
												<?php the_time(); ?> on
												<?php the_date(); ?> by
												 <strong><?php the_author(); ?></strong>
												</p>

												<div class="content">
												<?php the_content(); ?>
												</div>
												
											</div>
									</div>

								</article>
							<?php endwhile; ?>
						<?php endif; ?>
						
					</div>
				</div>
			</div>
			<div class="col-md-3 ml-auto">
				
			</div>
		</div>
	</div>
	<!-- -->
<?php get_footer();?>
	