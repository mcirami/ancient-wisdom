<?php
ob_start();
/**
 * Template Name: Video Blog
 *
 * The template for displaying Videos Submitted.
 *
 *
 * @package boiler
 */

get_header();

acf_form_head();
$args = array(
	'post_type' => 'member-videos',
	'order_by' => 'post_date',
	'order' => 'DESC',
	'posts_per_page' => -1,
);

$posts = new WP_Query($args);

?>

<?php get_template_part( 'content', 'page-header' ); ?>

	<section class="video_submit row">
		<div class="col-12">
			<div class="container">
				<div class="top_section">
					<button id="post_video_btn" class="button blue">Post A Video & Question</button>
				</div><!-- top_section -->

				<div id="post_submit_form" class="row">

					<div class="col-8 mx-auto">

						<div class="form_wrapper mt-5">

							<h2 class="text-center mb-4">Upload A YouTube Video & Question</h2>
							<?php

							acf_form(array(
								'post_id'		=> 'new_post',
								'post_title'	=> true,
								'post_content'	=> false,
								'new_post'		=> array(
									'post_type'		=> 'member-videos',
									'post_status'	=> 'publish'
								),
								'return'		=> home_url('/member-content/'),
								'submit_value'	=> 'Submit Post',
								'html_after_fields' => '<a class="cancel_post button green" href="#">Cancel</a>'
							));

							?>
						</div><!-- form_wrapper -->
					</div>
				</div>

				<article class="content row">

					<div class="col-12">

						<?php if ( $posts->have_posts() ) : ?>

							<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

								<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to overload this in a child theme then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content-video-blog', get_post_format() );
								?>

							<?php endwhile; ?>

							<?php //boiler_content_nav( 'nav-below' ); ?>

						<?php else : ?>
							<div class="row text-center py-5 my-5">
								<div class="col-12">
									<h3>No Submissions Yet</h3>
									<p>Click on the button above to post a video and question.</p>
								</div>
							</div>

						<?php endif; ?>

					</div>
				</article>
			</div><!-- container -->

			<?php //get_sidebar(); ?>

		</div><!-- full_width -->

	</section>

<?php get_footer(); ?>
