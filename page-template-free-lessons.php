<?php
/**
 * Template Name: Free Lessons
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

	<?php if (get_the_ID() == 77) : ?>

		<?php get_template_part( 'content', 'free-lessons-full' ); ?>

	<?php else :?>

		<?php get_template_part( 'content', 'free-lessons' ); ?>

	<?php endif; ?>


<?php get_footer(); ?>
