<?php $twoColumnSection = get_field('two_column_section');

if($twoColumnSection) : ?>
	<section class="row free_videos" id="free_lessons_section">
		<div class="col-12">

			<?php if ( have_rows( 'two_column_section' ) ) : ?>
				<?php while ( have_rows( 'two_column_section' ) ) : the_row();
					$count = 0;
					?>
					<?php if ( have_rows( 'video_section' ) ) : ?>
						<?php while ( have_rows( 'video_section' ) ) : the_row();
							++$count;

							$sectionTitle = get_sub_field('section_title');
							$sectionTitleHash = strtolower(preg_replace("/[^a-z0-9]+/i", "", $sectionTitle));
							?>


							<div class="row video_section <?php if($count % 2 !== 0) { echo 'background'; }?>" id="<?php echo $sectionTitleHash; ?>">
								<div class="col-12">
									<?php if ($count > 1) : ?>
										<div class="row link_wrap video_sections">
											<div class="col-12 text-center">
												<p>Next Section</p>
												<a class="rounded-circle scroll_to_section" href="#<?php echo $sectionTitleHash; ?>">
													<img src="<?php echo bloginfo( 'template_url' ); ?>/images/icon-arrow-down.png"/>
												</a>
											</div>
										</div>
									<?php endif; ?>
									<div class="container">
										<article class="content row">

											<h2 class="animated fadeIn duration4 eds-on-scroll text-center mb-4 mb-md-5 mt-0 <?php if ($count % 2 == 0) echo 'black'; ?>"><?php echo $sectionTitle; ?></h2>

											<?php if ( have_rows( 'video_column' ) ) :
													$columnCount = 0;
												?>
												<?php while ( have_rows( 'video_column' ) ) : the_row();
													++$columnCount
												?>

													<?php
													$post_object = get_sub_field('video');
													if ($post_object) :

														// override $post
														$post = $post_object;
														setup_postdata( $post );
														$videoLink = get_field('video_link');

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

														?>

														<div class="animated fadeIn duration4 eds-on-scroll video_box mb-5 mb-sm-0 col-12 col-sm-6 <?php if ($columnCount == 1) { echo 'pr-0 pr-sm-5'; } else { echo 'pr-1 pl-3 pl-sm-5'; }?>">
															<div class="row">
																<div class="col-12 p-0">

																<?php
																	$attachment_id =  get_field('video_image');
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
																	<div class="play_button_wrap video_open position-absolute " data-video="<?php echo $embedLink; ?>">
																		<div class="img_wrap m-auto">
																			<img class="play_button m-auto video_open_img" src="<?php echo bloginfo( 'template_url' ); ?>/images/icon-play.png"/>
																		</div>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="desc p-4 col-12 <?php if ($count % 2 == 0) echo 'gray'; ?>">
																	<div class="video_description">
																		<p><?php the_field('video_description', false); ?></p>
																	</div>
																</div>
															</div>
														</div><!-- video_box -->
														<?php
														wp_reset_postdata();
													endif; ?>


												<?php endwhile; ?>
											<?php endif; ?>

										</article>
									</div>
								</div>
							</div>

						<?php endwhile; ?>
					<?php endif; ?>

				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</section><!-- videos -->

<?php endif; ?>

<?php if(is_page('section-two') || is_page('section-three') || is_page('home')) : ?>
	<div class="row more_videos pb-0 pb-md-5 mb-0 mb-md-4">
		<div class="col-12 text-center">
			<div class="container">
				<?php
				if(is_page('home')) {
					$link = "/section-two";
				} elseif(is_page('section-two')) {
					$link = "/section-three";
				} else {
					$link = "/plans/membership-options";
				}
				?>

				<a class="text-uppercase float-right button blue arrow" href="<?php echo home_url() . $link; ?>">More Lessons</a>
			</div>
		</div>
	</div>
	<?php if(!is_front_page()) :?>

		<?php get_template_part( 'content', 'mailchimp-form' ); ?>

	<?php endif; ?>

<?php endif; ?>
