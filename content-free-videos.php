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

											<h2 class="text-center mb-5 mt-0 <?php if ($count % 2 == 0) echo 'black'; ?>"><?php the_sub_field('section_title'); ?></h2>

											<?php if ( have_rows( 'video_column' ) ) :
													$columnCount = 0;
												?>
												<?php while ( have_rows( 'video_column' ) ) : the_row();
													++$columnCount
												?>

													<?php $post_object = get_sub_field('video');

													if ($post_object) :

														// override $post
														$post = $post_object;
														setup_postdata( $post );
														?>

														<div class="video_box col-6 <?php if ($columnCount == 1) { echo 'pr-4'; } else { echo 'pl-4'; }?>">
															<?php $image =  get_field('video_image'); ?>
															<img class="video_open" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" data-video="<?php the_field('video_link'); ?>">
															<div class="desc p-4 <?php if ($count % 2 == 0) echo 'gray'; ?>">
																<p><?php the_field('video_description'); ?></p>
															</div>
														</div>
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

<div class="row more_videos py-5">
	<div class="col-12 text-center">

		<?php
		if(is_page('home')) {
			$link = "/part-two";
			$text = "More Videos";
		} elseif(is_page('part-two')) {
			$link = "/part-three";
			$text = "More Videos";
		} else {
			$link = "sign-up";
			$text = "Join To View More";
		}
		?>

		<a class="text-uppercase" href="<?php echo $link; ?>"><?php echo $text;?></a>
	</div>
</div>