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

							if (strpos($permalink, "login") == true) : ?>
								<div class="col-12 text-center mb-5 pb-5 login_text">
									<h3 class="mb-5">Don't Have An Account Yet?</h3>
									<a class="button blue text-uppercase" href="/plans/membership-plans/">Click Here To Register!</a>
								</div>

							<?php elseif (strpos($permalink, "donate") == true) : ?>

								<div class="row">
									<div class="col-12">
										<h3 class="text-center"><?php the_field('description'); ?></h3>
										<?php echo do_shortcode('[paypal-donation]'); ?>
									</div>
								</div>

							<?php endif; ?>

						<div class="<?php if(strpos($permalink, 'account') == true || strpos($permalink, 'affiliate-area') == true || strpos($permalink, 'thank-you') == true) echo 'account_page col-12 form_wrapper';
								else echo 'col-12 col-md-6 mx-auto form_wrapper'; ?>" >
							<?php the_content(); ?>
						</div>
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
