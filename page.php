<?php get_header(); ?>

	<main role="main" class="main">
		<!-- section -->
		<section>

			<?php get_template_part( 'content', 'page-header' ); ?>


		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="container">
					<div class="row">
						<?php $permalink = get_permalink();

							if (strpos($permalink, "donate") == true) : ?>


								<div class="col-12 mb-5 pb-5">
									<h3 class="text-center"><?php the_field('description'); ?></h3>
									<?php echo do_shortcode('[paypal-donation]'); ?>
								</div>


						<?php else : ?>

							<div class="<?php
									if(strpos($permalink, 'account') == true || strpos($permalink, 'affiliate-area') == true || strpos($permalink, 'thank-you') == true) echo 'account_page col-12 form_wrapper';
									elseif (strpos($permalink, 'plans') == true) echo 'col-12';
									else echo 'col-12 col-md-6 mx-auto form_wrapper'; ?>" >

								<?php the_content(); ?>

								<?php if (strpos($permalink, "login") == true) : ?>
									<div class="login_text position-absolute">
										<p class="mb-0">Don't Have An Account Yet?</p>
										<a href="<?php echo home_url(); ?>/plans/membership-options/">Click Here To Register!</a>
									</div>
								<?php endif; ?>

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
