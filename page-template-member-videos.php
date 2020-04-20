<?php
/**
 * Template Name: Member Videos
 *
 * The template for displaying Member videos.
 *
 *
 * @package boiler
 */
/*

*/
get_header();

$title = get_the_title();
$favorites = get_user_favorites();

global $post;

if ($title == "Member Lessons") {

	//$ourCurrentPage = get_query_var('pages');

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

				<div class="video_list full_width">

					<?php if ($title == "Member Lessons") : ?>

						<div class="filter_controls full_width">
							<div class="search_box">
								<input type="text" name="search" placeholder="Search Lesson By Keyword" data-search>
							</div>

							<div class="filters">
								<h3>Filter Lessons By<span>:</span></h3>
								<p>(select as many as you like)</p>

								<ul class="filter_list full_width">
									<li data-multifilter="all" class="active all">All</li>

									<?php /*foreach ($levelTerms as $levelTerm) : */?><!--

										<li data-multifilter="<?php /*echo $levelTerm->term_id;*/?>"><?php /*echo $levelTerm->name;*/?></li>

									--><?php /*endforeach; */?>

									<?php foreach ($catTerms as $catTerm) :

										if($catTerm->slug !== "members-only" /*&& $catTerm->slug !== "free-lessons"*/) :
											?>
											<li data-multifilter="<?php echo $catTerm->term_id;?>"><?php echo $catTerm->name;?></li>

										<?php endif; ?>

									<?php endforeach; ?>

								</ul>
							</div>
						</div><!-- filter_controls -->
					<?php elseif ($title == "Favorite Lessons") : ?>

						<div class="top_content full_width">
							<?php if ($favorites != null) :
								$favCount = get_user_favorites_count();
								?>
								<h3><?php echo $favCount; ?> <?php if( $favCount == 1) { echo "Favorite"; } else {echo "Favorites";}?></h3>
							<?php endif; ?>

							<?php the_clear_favorites_button(); ?>
						</div>

					<?php endif; ?>

					<div id="filter_images" class="filtr-container full_width">

							<?php if ($favorites == null && $title == "Favorite Lessons") : ?>

								<div class="text_wrap full_width">
									<h2>You have no Favorite Lessons</h2>
									<div class="button_wrap full_width">
										<a class="button red" href="/lessons">Go To Lesson page Now!</a>
									</div>

								</div>

							<?php else : ?>

								<?php if ( $videos->have_posts() ) : while( $videos->have_posts() ) : $videos->the_post(); ?>

									<?php get_template_part('content', 'member-videos'); ?>

								<?php endwhile; //query loop

								/*previous_posts_link();
								next_posts_link('Next Page', $lessons->max_num_pages);*/
								else :

									echo 'no posts found';

								endif; // if has posts

									wp_reset_query();
								?>

							<?php endif; ?>

					</div><!-- filtr-container filter_images-->
				</div><!-- video_list -->

				<div class="pagination full_width"></div>

			</div><!-- container -->
		</div>
	</section>

<?php /*get_template_part( 'content', 'member-videos' ); */?>

<?php get_footer(); ?>