
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

								?>

								<div class="animated fadeIn duration4 eds-on-scroll video_box col-12 col-md-6 mb-4 mb-md-0 <?php if ($count % 2 !== 0) { echo 'pr-2 pr-md-4'; } else { echo 'pl-2 pl-md-4'; }?>">
									<div class="row <?php if ($count % 2 !== 0) { echo 'pr-2'; } else { echo 'pl-2'; } ?>">
										<div class="col-12 p-0">

											<?php get_template_part('content', 'video-link'); ?>

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

	<?php if (!is_user_logged_in()) : ?>

		<div class="row more_videos pb-4 pb-md-5 mb-4">
			<div class="col-12 text-center">
				<div class="container">
					<a class="text-uppercase float-right button blue arrow" href="<?php echo home_url().'/plans/membership-options' ?>">More Lessons</a>
				</div>
			</div>
		</div>

		<?php get_template_part( 'content', 'mailchimp-form' ); ?>

	<?php endif; ?>