<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<!--<article id="post-<?php /*the_ID(); */?>" --><?php /*post_class(); */?>


		<?php get_template_part( 'content', 'member-lessons' ); ?>

		<!-- post title -->
		<!--<h2>
			<a href="<?php //the_permalink(); ?>" title="<?php //the_title(); ?>"><?php //the_title(); ?></a>
		</h2>-->
		<!-- /post title -->

	<!--</article>-->
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
