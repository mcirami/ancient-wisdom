<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<?php get_template_part( 'content', 'page-header' ); ?>


		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="container">
					<div class="row">
						<?php $permalink = get_permalink(); ?>
						<div class="<?php if ( strpos($permalink, "plans") == false && strpos($permalink, "account") == false ) echo "col-12 col-md-6 mx-auto form_wrapper";
								elseif (strpos($permalink, "account") == true) echo "account_page col-12 mx-auto form_wrapper"; ?>">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
<!--				--><?php /*comments_template( '', true ); // Remove if you don't want comments */?>

				<br class="clear">

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
