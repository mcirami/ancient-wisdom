
	<section class="row free_videos">
		<article class="col-12">

			<?php if ( have_rows( 'videos' ) ) :
					$count = 0;?>
				<div class="container">

					<?php while ( have_rows( 'videos' ) ) : the_row();

					++$count;
					?>
						<?php if($count % 2 !== 0) : ?>
							<div class="content row mb-5">
						<?php endif; ?>

						<?php
							$post_object = get_sub_field('video');
							if ($post_object) :

								// override $post
								$post = $post_object;
								setup_postdata( $post );

								$type = "";
								$videoLink = get_field('video_link');
								if (strpos($videoLink, "youtube") !== false) {
									if(strpos($videoLink,"v=")) {
										$str = explode("v=", $videoLink);
										$embedCode = preg_replace('/\s+/', '',$str[1]);
									} else if (strpos($videoLink, "embed/")) {
										$str = explode("embed/", $videoLink);
										$embedCode = preg_replace('/\s+/', '',$str[1]);
									} else if (strpos($videoLink, "youtu.be")) {
										$str = explode(".be/", $videoLink);
										$embedCode = preg_replace('/\s+/', '',$str[1]);
									}
									$type = "youtube";
								} elseif (strpos($videoLink, "vimeo") !== false) {
									$str       = explode( "vimeo.com/", $videoLink );
									$embedCode = preg_replace( '/\s+/', '', $str[1] );
									$type      = "vimeo";
								}

								?>

								<div class="animated fadeIn duration4 eds-on-scroll video_box col-6 <?php if ($count % 2 !== 0) { echo 'pr-4'; } else { echo 'pl-4'; }?>">
									<div class="row <?php if ($count % 2 !== 0) { echo 'pr-2'; } else { echo 'pl-2'; } ?>">
										<div class="col-12 p-0">

											<?php
											$attachment_id =  get_field('video_image');
											$size = "video-thumb";
											$videoImage = wp_get_attachment_image_src( $attachment_id, $size );

											if (!empty($videoImage)) :
												?>

												<img src="<?php echo $videoImage[0]; ?>" alt="<?php //echo esc_attr( $image['alt'] ); ?>">

											<?php elseif ($type == "youtube") : ?>

												<img src="https://img.youtube.com/vi/<?php echo $embedCode; ?>/mqdefault.jpg" alt="<?php //echo esc_attr( $image['alt'] ); ?>">

											<?php endif; ?>
											<div class="play_button_wrap video_open position-absolute w-100 h-100 d-flex justify-content-center align-content-center" data-video="<?php echo $videoLink; ?>">
												<div class="img_wrap m-auto">
													<img class="play_button m-auto video_open_img video_open_img" src="<?php echo bloginfo( 'template_url' ); ?>/images/icon-play.png"/>
												</div>
											</div>
										</div>
										<div class="desc p-4 col-12 gray">
											<p><?php the_field('video_description'); ?></p>
										</div>
									</div>
								</div><!-- video_box -->
								<?php
								wp_reset_postdata();
							endif; ?>

						<?php if($count % 2 == 0) : ?>
							</div>
						<?php endif; ?>

					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</article>
	</section><!-- videos -->

<div class="row more_videos pb-4 pb-md-5 mb-4">
	<div class="col-12 text-center">
		<div class="container">
			<a class="text-uppercase float-right button blue arrow" href="<?php echo home_url().'/plans/membership-plans' ?>">More Lessons</a>
		</div>
	</div>
</div>

	<div class="row mb-5">
		<div class="col-12">
			<div class="container">
				<div class="form_wrapper mailchimp mt-5 animated fadeIn duration4 eds-on-scroll">
					<div class="row">
						<div class="col-12 col-xl-10 mx-auto d-flex align-content-center justify-content-center mb-4">
							<img class="mr-4 d-none d-md-block" src="<?php echo bloginfo( 'template_url' ); ?>/images/double-arrows.png"/>
							<h4>Enter Your Information Below To Get Free Lessons Delivered To Your Inbox</h4>
							<img class="ml-4 d-none d-md-block" src="<?php echo bloginfo( 'template_url' ); ?>/images/double-arrows.png"/>
						</div>
					</div>
					<?php
					if($_SERVER['HTTP_HOST'] === 'wisdom.test' ) :
						echo do_shortcode('[mc4wp_form id="266"]');
					else:
						echo do_shortcode('[mc4wp_form id="302"]');
					endif; ?>

				</div>
			</div>
		</div>
	</div>