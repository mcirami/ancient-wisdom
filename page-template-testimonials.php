<?php
/**
 * Template Name: Testimonials
 *
 * The template for displaying Testimonials Page.
 *
 *
 * @package boiler
 */
/*

*/
get_header();

?>
<?php get_template_part( 'content', 'page-header' ); ?>

<?php

$videoTextSlider = get_field('text_only_slider');

if($videoTextSlider) :

?>
	<?php if ( have_rows( 'text_only_slider' ) ) : ?>

		<?php while ( have_rows( 'text_only_slider' ) ) : the_row(); ?>

			<section class="row text_slider">
				<div class="col-12">
					<div class="container">
						<div id="carouselText" class="carousel slide carousel-fade" data-ride="carousel">

							<?php if ( have_rows( 'text_only_slide' ) ) : $count = 0;?>

								<div class="carousel-inner">

									<?php while ( have_rows( 'text_only_slide' ) ) : the_row(); $count++; ?>


										<div class="carousel-item <?php if ($count == 1) echo 'active'; ?>">

											<article class="row">
												<div class="col-12 col-md-8 mx-auto">

													<div class="text_box d-flex align-content-center">
														<p class="m-auto"><?php the_sub_field('slide_text');?></p>
													</div>
													<h4 class="d-block mt-4"><?php the_sub_field('slide_name');?></h4>
												</div>
											</article>

										</div><!-- carousel-item" -->

									<?php endwhile; ?>

								</div><!--carousel-inner  -->

								<a class="carousel-control-prev" href="#carouselText" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselText" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

		<?php endwhile; ?>
	<?php endif; ?>


	<?php
	wp_reset_postdata();

	endif; ?>

<?php

$videoTextSlider = get_field('video_text_slider');

if($videoTextSlider) :

	?>
	<?php if ( have_rows( 'video_text_slider' ) ) : ?>

	<?php while ( have_rows( 'video_text_slider' ) ) : the_row(); ?>

		<section class="row video_text_slider mb-5">
			<div class="col-12">
				<div class="container">

					<div id="carouselVideoText" class="carousel slide carousel-fade" data-ride="carousel">

						<?php if ( have_rows( 'slides' ) ) :
							$count = 0;

							//$slides = get_sub_field('slides');
							//$rowCount = count($slides);
							//echo $rowCount;
							?>


							<div class="carousel-inner">

								<?php while ( have_rows( 'slides' ) ) : the_row(); $count++; ?>

									<div class="carousel-item <?php if($count == 1) echo 'active'; ?>">
										<article class="row">
											<div class="col-12 col-md-6">
												<?php
												$videoLink = get_sub_field( 'slider_video_link' );

												if(strpos($videoLink,"v=") !== false) {
													$str = explode("v=", $videoLink);
													$embedCode = preg_replace('/\s+/', '',$str[1]);
													$type = "youtube";
												} else if (strpos($videoLink, "embed/") !== false) {
													$str = explode("embed/", $videoLink);
													$embedCode = preg_replace('/\s+/', '',$str[1]);
													$type = "youtube";
												} else if (strpos($videoLink, "youtu.be") !== false) {
													$str = explode(".be/", $videoLink);
													$embedCode = preg_replace('/\s+/', '',$str[1]);
													$type = "youtube";
												}else if (strpos($videoLink, "vimeo") !== false) {
													$str       = explode( "vimeo.com/", $videoLink );
													$embedCode = preg_replace( '/\s+/', '', $str[1] );
													$type      = "vimeo";
												}

												if($type == "youtube") {
													$embedLink = "https://www.youtube.com/embed/" . $embedCode . "/?rel=0&showinfo=0&autoplay=1";
												} else {
													$embedLink = "https://player.vimeo.com/video/" . $embedCode . "/?autoplay=1";
												}

												$attachment_id =  get_sub_field('slider_video_image');
												$size = "video-thumb";
												$videoImage = wp_get_attachment_image_src( $attachment_id, $size );

												if (!empty($videoImage)) :
													?>

													<img src="<?php echo $videoImage[0]; ?>" alt="video image placeholder">

												<?php elseif ($type == "youtube") : ?>

													<img src="https://img.youtube.com/vi/<?php echo $embedCode; ?>/mqdefault.jpg" alt="youtube video thumbnail">

												<?php else : ?>

													<img src="<?php echo bloginfo('template_url'); ?>/images/video-placeholder.jpg" alt="video image placeholder"/>

												<?php endif; ?>

												<div class="play_button_wrap video_open position-absolute w-100 h-100 d-flex justify-content-center align-content-center" data-video="<?php echo $embedLink; ?>">
													<div class="img_wrap m-auto">
														<img class="play_button m-auto video_open_img" src="<?php echo bloginfo( 'template_url' ); ?>/images/icon-play.png"/>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<p>"<?php the_sub_field('slider_text');?>"</p>
												<h4><?php the_sub_field('persons_name');?></h4>
											</div>
										</article>
									</div><!-- carousel-item" -->

								<?php endwhile; ?>
								<ol class="carousel-indicators">
									<?php
									for($x = 0; $x < $count; $x++) {
										echo "<li data-target='#carouselVideoText' data-slide-to='$x'"; if( $x == 0) { echo " class='active'"; } echo "></li>";
									}
									?>
								</ol>
							</div><!-- carousel-inner -->
						<?php endif; ?>
					</div><!-- carouselVideoText  -->
				</div><!-- container -->
			</div><!-- col-12 -->
		</section>

	<?php endwhile; ?>

<?php endif; ?>

	<?php
	wp_reset_postdata();
endif; ?>

<?php if ( have_rows( 'video_only' ) ) : ?>
	<?php while ( have_rows( 'video_only' ) ) : the_row(); ?>

		<section class="row full_width_video mb-5 px-5">
			<div class="col-12 col-md-6 mx-auto">
				<?php
				$videoLink = get_sub_field( 'video_link' );

				if(strpos($videoLink,"v=") !== false) {
					$str = explode("v=", $videoLink);
					$embedCode = preg_replace('/\s+/', '',$str[1]);
					$type = "youtube";
				} else if (strpos($videoLink, "embed/") !== false) {
					$str = explode("embed/", $videoLink);
					$embedCode = preg_replace('/\s+/', '',$str[1]);
					$type = "youtube";
				} else if (strpos($videoLink, "youtu.be") !== false) {
					$str = explode(".be/", $videoLink);
					$embedCode = preg_replace('/\s+/', '',$str[1]);
					$type = "youtube";
				}else if (strpos($videoLink, "vimeo") !== false) {
					$str       = explode( "vimeo.com/", $videoLink );
					$embedCode = preg_replace( '/\s+/', '', $str[1] );
					$type      = "vimeo";
				}

				if($type == "youtube") {
					$embedLink = "https://www.youtube.com/embed/" . $embedCode . "/?rel=0&showinfo=0&autoplay=1";
				} else {
					$embedLink = "https://player.vimeo.com/video/" . $embedCode . "/?autoplay=1";
				}

				$attachment_id =  get_sub_field('video_image');
				$size = "video-thumb";
				$videoImage = wp_get_attachment_image_src( $attachment_id, $size );

				if (!empty($videoImage)) :
					?>

					<img src="<?php echo $videoImage[0]; ?>" alt="video image placeholder">

				<?php elseif ($type == "youtube") : ?>

					<img src="https://img.youtube.com/vi/<?php echo $embedCode; ?>/maxresdefault.jpg" alt="youtube video thumbnail">

				<?php else : ?>

					<img src="<?php echo bloginfo('template_url'); ?>/images/video-placeholder.jpg" alt="video image placeholder"/>

				<?php endif; ?>

				<div class="play_button_wrap video_open position-absolute w-100 h-100 d-flex justify-content-center align-content-center" data-video="<?php echo $embedLink; ?>">
					<div class="img_wrap m-auto">
						<img class="play_button m-auto video_open_img" src="<?php echo bloginfo( 'template_url' ); ?>/images/icon-play.png"/>
					</div>
				</div>
			</div>
		</section>

	<?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_postdata();?>

<?php get_footer(); ?>
