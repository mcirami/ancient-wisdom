<?php $twoColumnSection = get_field('two_column_section');

if($twoColumnSection) : ?>
	<section class="row free_videos">
		<div class="col-12">

			<?php if ( have_rows( 'two_column_section' ) ) : ?>
				<?php while ( have_rows( 'two_column_section' ) ) : the_row();
					$count = 0;
					?>
					<?php if ( have_rows( 'video_section' ) ) : ?>
						<?php while ( have_rows( 'video_section' ) ) : the_row();
							++$count;
							?>
							<div class="row video_section <?php if($count % 2 !== 0) { echo 'background'; }?>">
								<div class="col-12">
									<div class="container">
										<article class="content row">

											<h2 class="animated fadeIn duration4 eds-on-scroll text-center mb-4 mb-md-5 mt-0 <?php if ($count % 2 == 0) echo 'black'; ?>"><?php the_sub_field('section_title'); ?></h2>

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

														<div class="animated fadeIn duration4 eds-on-scroll video_box col-6 <?php if ($columnCount == 1) { echo 'pr-4'; } else { echo 'pl-4'; }?>">
															<div class="row <?php if ($columnCount == 1) { echo 'pr-2'; } else { echo 'pl-2'; } ?>">
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
																			<img class="play_button m-auto video_open_img" src="<?php echo bloginfo( 'template_url' ); ?>/images/icon-play.png"/>
																		</div>
																	</div>
																</div>
																<div class="desc p-4 col-12 <?php if ($count % 2 == 0) echo 'gray'; ?>">
																	<p><?php the_field('video_description'); ?></p>
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

<div class="row more_videos py-4 py-md-5">
	<div class="col-12 text-center">

		<?php
		if(is_page('home')) {
			$link = "/part-two";
			$text = "More Videos";
		} elseif(is_page('part-two')) {
			$link = "/part-three";
			$text = "More Videos";
		} else {
			$link = home_url()."/plans/membership-plans";
			$text = "Join To View More";
		}
		?>

		<a class="text-uppercase" href="<?php echo $link; ?>"><?php echo $text;?></a>
	</div>
</div>