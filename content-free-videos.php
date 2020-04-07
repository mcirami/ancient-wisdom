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
							<div class="row <?php if($count % 2 !== 0) { echo 'background'; }?>">
								<div class="col-12">
									<div class="container">
										<article class="content row text-center">

											<h2><?php the_sub_field('section_title'); ?></h2>

											<?php if ( have_rows( 'video_column' ) ) : ?>
												<?php while ( have_rows( 'video_column' ) ) : the_row(); ?>

													<?php $post_object = get_sub_field('video');

													if ($post_object) :

														// override $post
														$post = $post_object;
														setup_postdata( $post );
														?>

														<div class="video_box col-6">
															<?php $image =  get_field('video_image'); ?>
															<img class="video_open" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" data-video="<?php the_field('video_link'); ?>">
															<div class="desc">
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