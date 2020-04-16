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

								<!-- post thumbnail -->
								<?php /*if ( has_post_thumbnail()) : // Check if Thumbnail exists */?><!--
									<a href="<?php /*the_permalink(); */?>" title="<?php /*the_title(); */?>">
										<?php /*the_post_thumbnail(); // Fullsize image for the single post */?>
									</a>
								--><?php /*endif; */?>
								<!-- /post thumbnail -->

								<!-- post title -->
								<!--<h1>
									<a href="<?php /*the_permalink(); */?>" title="<?php /*the_title(); */?>"><?php /*the_title(); */?></a>
								</h1>-->
								<!-- /post title -->

								<!-- post details -->
								<!--<span class="date"><?php /*the_time('F j, Y'); */?> <?php /*the_time('g:i a'); */?></span>-->
								<!--<span class="author"><?php /*_e( 'Published by', 'html5blank' ); */?> <?php /*the_author_posts_link(); */?></span>-->

								<div class="row comment_template">
									<div class="col-12 col-md-10 mx-auto">

										<!--<span class="comments"><?php /*if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); */?></span>-->
										<!-- /post details -->

										<?php /*the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>');*/ // Separated by commas with a line break at the end ?>

										<p><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>

										<!--<p><?php /*_e( 'This post was written by ', 'html5blank' ); the_author(); */?></p>-->

										<?php //edit_post_link(); // Always handy to have Edit Post Links available ?>

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
