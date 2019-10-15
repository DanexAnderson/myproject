<?php get_header(); ?>

<div id="parent">
<div id="child">

	<div class="row ">

	<div class="col-1 mr-auto">
		<!----------- First Column  ------------->
	</div>

	<div class="col-md-8 col-12 postBG">
	<!-- ---------------------- Center Column ------------------------------>

			<?php if (have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?>
					<article class="post">

							<h2 class="titleTextShadow p-1" >								 

									<?php echo the_title(); ?>

							</h2><br>

							<!-- Gallery Query Check if Post Category is Article -->


							<td class="w-100 col-12 ">

				<!-------------------------------- Photo Gallery ----------------------->

								<?php if (in_category('Article') or has_term('article', 'phototype')) :
								
								include('Single.Page/single-page-gallery.php');

								endif; ?>
							</td>

			<!----------------------------------------- Check For Thumbnail ---------------------------->

							<?php if (has_post_thumbnail()) : ?>
					
								
				<!---------------------------------- Display Thumbnail / Featured Image  ---------------------- -->

								<?php the_post_thumbnail('full',['style' => 'width:100%!important; max-width:1200px; border-top-left-radius:5px; border-top-right-radius:5px; border: 5px solid white;'] );?>
			

						<?php endif; ?>

						<h6 class="meta captionTextShadow">
							Posted at
							<?php the_time(); ?> on
							<?php the_date(); ?> by
							<strong><?php the_author(); ?></strong>
						</h6>

						<br>

			<div class="content mb-5 bg-white p-5 " style="border-radius: 8px;"> 

<!----------------------------- Remove Images from the Content page ------------------------>
					<?php
						$content = get_the_content();
						$content = preg_replace("/<img[^>]+\>/i", " ", $content);
						
						$content = preg_replace("/<figure(.*?)<\/figure>/i", '', $content);
						;
						echo $content;						
					?>

			</div>

			<br>
			<br>
			<br/>			

					</article>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<div class="col-md-3 ml-auto">
		<!-- ------------------ 3rd Column Side Widget ------------------- -->

		</div>
	</div>
	<br><br><br/>
<?php get_footer(); ?>
</div>
</div>











































<!-- 					// $content = apply_filters('the_content', $content)
						 // $content = apply_filters('the_content', $content);
						// $content = str_replace(']]>', ']]>', $content);
						//	$myExcerpt = wp_trim_words(get_the_content(), strlen(get_the_content()), '');
						//	echo $myExcerpt; 
						
						
			// the_post_thumbnail(); // Without parameter ->; Thumbnail
			// the_post_thumbnail('thumbnail'); // Thumbnail (default 150px x 150px max)
			// the_post_thumbnail('medium'); // Medium resolution (default 300px x 300px max)
			// the_post_thumbnail('medium_large'); // Medium-large resolution (default 768px x no height limit max)
			// the_post_thumbnail('large'); // Large resolution (default 1024px x 1024px max)
			// the_post_thumbnail('full'); // Original image resolution (unmodified)
			// the_post_thumbnail(array(100, 100)); // Other resolutions (height, width

					-->