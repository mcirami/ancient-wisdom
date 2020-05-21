<?php get_header(); ?>

<?php $id = get_the_ID(); ?>

	<main role="main" class="main">
		<!-- section -->
		<section>

			<?php get_template_part( 'content', 'page-header' ); ?>


		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="container">
					<?php if ($id == 8 || $id == 33) : ?>
						<div class="login_text row text-center mb-5 pb-5">
							<div class="col-12">
								<p class="mb-3 mb-sm-5">Not A Member?</p>
								<a class="button blue arrow" href="<?php echo home_url(); ?>/plans/membership-options/">Check Out Our Membership Options</a>
							</div>
						</div>
					<?php endif; ?>
					<div class="row">
						<?php

							if ($id == 287 || $id == 246) : ?>

								<div class="col-12 mb-5 pb-5">
									<?php echo do_shortcode('[paypal-donation]'); ?>
								</div>

						<?php else : ?>

							<div class="<?php
									if($id == 32 || $id == 7 || $id == 6 || $id == 31 || $id == 36 || $id == 5) echo 'account_page col-12 form_wrapper';
									elseif ($id == 147) echo 'col-12';
									else echo 'col-12 col-md-8 col-lg-6 mx-auto form_wrapper'; ?>" >

								<?php the_content(); ?>

							</div>

							<?php endif; ?>
					</div>
				</div>

				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php /*get_sidebar(); */?>

<?php get_footer(); ?>
