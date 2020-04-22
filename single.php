<?php get_header(); ?>

	<main role="main" class="main single">
		<!-- section -->
		<section>

			<?php get_template_part( 'content', 'page-header' ); ?>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<div class="row">
					<div class="col-12 mb-5">
						<div class="container">
							<!-- article -->
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<?php get_template_part( 'content', 'single' ); ?>

								<div class="row comment_template">
									<div class="col-12 col-md-10 mx-auto">

										<p><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>

										<?php comments_template(); ?>
									</div>
								</div>

							</article>
							<!-- /article -->
						</div>
					</div>
				</div>

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

				</article>
				<!-- /article -->

			<?php endif; ?>

		</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
