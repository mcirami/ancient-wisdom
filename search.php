<?php get_header();

/*global $post;

$args = array(
	'post_type' => 'lessons',
	'order_by' => 'post_date',
	'order' => 'DESC',
	'posts_per_page' => -1
	//'paged' => $ourCurrentPage
);
$wp_query = new WP_Query($args);*/
?>

<?php get_template_part( 'content', 'page-header' ); ?>

	<main role="main">
		<!-- section -->

			<section class="row member_lessons">

				<div class="col-12">

					<div class="container">

						<div class="video_list full_width">

							<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

							<?php get_template_part('loop'); ?>

							<?php get_template_part('pagination'); ?>
						</div>
					</div>
				</div>

		</section>
		<!-- /section -->
	</main>

<?php
//wp_reset_query();
?>

<?php /*get_sidebar(); */?>

<?php get_footer(); ?>
