<?php
/**
 * Template Name: Member Lessons
 *
 * The template for displaying Member videos.
 *
 *
 * @package boiler
 */
/*

*/
get_header();

$id = get_the_ID();
$favorites = get_user_favorites();

global $post;

if ($id == 159 || $id == 187) {

	$args = array(
		'post_type' => 'lessons',
		'order_by' => 'post_date',
		'order' => 'DESC',
		'posts_per_page' => -1
		//'paged' => $ourCurrentPage
	);

	$catTerms = get_terms('category');
	/*$levelTerms = get_terms('level', array(
		'orderby' => 'description'
	));*/

} else {
	$args = array(
		'post_type' => 'lessons',
		'order_by' => 'post_date',
		'order' => 'DESC',
		'post__in' => $favorites,
		//'posts_per_page' => -1,
	);
}

$videos = new WP_Query($args);

?>

<?php get_template_part( 'content', 'page-header' ); ?>

	<section class="row member_lessons">

		<div class="col-12">

			<div class="container">

				<div class="video_list row">

					<div class="col-12">

						<?php if ($id == 159 || $id == 187) : ?>

							<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
								<input class="search-input" type="search" name="s" placeholder="<?php _e( 'To search, type and hit enter.', 'html5blank' ); ?>">
								<input type="hidden" name="post_type" value="lessons" />
								<button class="search-submit" type="submit" role="button"><?php _e( 'Search', 'html5blank' ); ?></button>
							</form>

						<?php elseif ($id == 225 || $id == 208) : ?>

							<div class="top_content row">
								<div class="col-12">
									<?php if ($favorites != null) :
										$favCount = get_user_favorites_count();
										?>
										<h3><?php echo $favCount; ?> <?php if( $favCount == 1) { echo "Favorite"; } else {echo "Favorites";}?></h3>
									<?php endif; ?>

									<?php the_clear_favorites_button(); ?>
								</div>
							</div>

						<?php endif; ?>

						<div class="row">
							<div class="col-12">

								<?php if ($favorites == null && ($id == 225 || $id == 208)) : ?>

									<div class="text_wrap row">
										<div class="col-12">
											<h2>You have no Favorite Lessons</h2>
											<div class="button_wrap full_width">
												<a class="button red" href="<?php echo home_url()?>/member-lessons">Go To Lesson page Now!</a>
											</div>
										</div>
									</div>

								<?php else : ?>

									<?php if ( $videos->have_posts() ) : while( $videos->have_posts() ) : $videos->the_post(); ?>

										<?php get_template_part('content', 'member-lessons'); ?>

									<?php endwhile; //query loop

									else :

										echo 'no posts found';

									endif; // if has posts

										wp_reset_query();
									?>

								<?php endif; ?>
							</div><!-- col-12 -->

						</div><!-- row-->
					</div><!-- col-12 -->
				</div><!-- video_list -->

				<div class="pagination full_width"></div>

			</div><!-- container -->
		</div>
	</section>

<?php /*get_template_part( 'content', 'member-videos' ); */?>

<?php get_footer(); ?>