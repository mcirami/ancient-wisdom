<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php get_template_part( 'content', 'page-header' ); ?>

	<section class="single_video row">
		<div class="col-12">
			<div class="container">

				<div class="row">
					<div class="col-12">
						<div id="primary" class="content-area">
							<main id="main" class="site-main" role="main">

								<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post(); ?>

									<a class="back_link button blue arrow mb-5 d-inline-block" href="<?php echo home_url(); ?>/member-content">back to submissions</a>
									<?php
									the_post_navigation( array(
										'prev_text' => '<span class="screen-reader-text button black">' . __( 'Previous Submission', 'boiler' ) . '</span>',
										'next_text' => '<span class="screen-reader-text button black">' . __( 'Next Submission', 'boiler' ) . '</span>'
									) );

									get_template_part( 'content', 'single-member-video' );

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

								endwhile; // End of the loop.
								?>

							</main><!-- #main -->
						</div><!-- #primary -->
					</div>
				</div><!-- .wrap -->
			</div>
		</div>
	</section>

<?php get_footer();
