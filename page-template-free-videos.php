<?php
/**
 * Template Name: Free Videos
 *
 * The template for displaying Free videos.
 *
 *
 * @package boiler
 */
/*

*/
get_header(); ?>

	<?php get_template_part( 'content', 'page-header' ); ?>

	<?php if (get_the_title() == "Happiness") : ?>

		<?php get_template_part( 'content', 'free-videos-full' ); ?>

	<?php else :?>

		<?php get_template_part( 'content', 'free-videos' ); ?>

	<?php endif; ?>


<?php get_footer(); ?>
