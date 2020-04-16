<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<?php get_template_part( 'content', 'page-header' ); ?>

			<!-- article -->
			<article id="post-404" class="my-5 py-5">
				<h2 class="text-center">
					<a class="text-uppercase" href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'html5blank' ); ?></a>
				</h2>

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php /*get_sidebar(); */?>

<?php get_footer(); ?>
