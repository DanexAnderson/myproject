<?php get_header(); ?>

<div id="parent">
	<div id="child">
		<div class="row ">

			<div class="col-1 mr-auto">
			</div>
			<div class="col-md-8 col-12">

				<?php if (have_posts()) : ?>

					<?php while (have_posts()) : the_post(); ?>
						<article class="post">

							<div class="col-12 w-100 ml-n3 ml-md-0" style="max-width:1200px">
								<h2>
									<span href="<?php // echo the_permalink(); 
														?>">
										<?php echo the_title(); ?>
									</span>
								</h2>

								<!-- Gallery Query Check if Post Category is Article -->

								<?php
										if (in_category('Article')) :
										
										include('Single.Page/galleryQuery.php'); ?>

								<td class="w-100 col-12 ">
									<!-- Photo Gallery -->
									<?php include('Single.Page/single-page-gallery.php'); endif; ?>
								</td>

								<!-- Check For Thumbnail -->
								<?php if (has_post_thumbnail()) : ?>
									<!-- Display Thumbnail / Featured Image -->

									<!-- ---------- Start Position Absolute ------------- -->
									<div style="max-width:1200px; width:100%; position:absolute; height:100%; margin-top:5vh">

										<table style="max-height: 400px !important; height: 400px !important;">
											<tr style="max-height: 400px !important; height: 400px !important;">
												<td style="max-height: 400px !important; height: 400px !important;">
													<div id="thumb-nail">
														<?php the_post_thumbnail();

																	// the_post_thumbnail(); // Without parameter ->; Thumbnail
																	// the_post_thumbnail('thumbnail'); // Thumbnail (default 150px x 150px max)
																	// the_post_thumbnail('medium'); // Medium resolution (default 300px x 300px max)
																	// the_post_thumbnail('medium_large'); // Medium-large resolution (default 768px x no height limit max)
																	// the_post_thumbnail('large'); // Large resolution (default 1024px x 1024px max)
																	// the_post_thumbnail('full'); // Original image resolution (unmodified)
																	// the_post_thumbnail(array(100, 100)); // Other resolutions (height, width
																	?>
													</div>
												</td>
											</tr>
										</table>

									<?php endif; ?>

									<p class="meta ">
										Posted at
										<?php the_time(); ?> on
										<?php the_date(); ?> by
										<strong><?php the_author(); ?></strong>
									</p>

									<br>

									<div class="content mb-5 ">
										<?php the_content(); ?>
									</div>

									<br>
									<br>
									<br />


									<?php get_footer(); ?>

									</div>
									<!-- -------------------- End Postion Absolute -->

							</div>
						</article>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<div class="col-md-3 ml-auto">

			</div>
		</div>

	</div>
</div>