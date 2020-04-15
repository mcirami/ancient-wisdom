<?php
/**
 * Template Name: Live Q & A
 *
 * The template for displaying Live Q & A Page.
 *
 *
 * @package boiler
 */
/*

*/
get_header(); ?>

<?php get_template_part( 'content', 'page-header' ); ?>

	<div class="row">
		<div class="col-12 text-center">
			<a class="m-auto d-inline-block" href="https://discordapp.com/invite/3xTqwQh">
				<img class="img-fluid" src="<?php echo bloginfo( 'template_url' ); ?>/images/discord-logo.svg"/>
			</a>
		</div>
	</div>

	<div class="row my-5">
		<div class="col-12 text-center my-5">
			<a class="py-5 button square green w-50 m-auto d-block larger_font" target="_blank" href="https://discordapp.com/invite/3xTqwQh">Join The Discussion</a>
		</div>
	</div>


<?php get_footer(); ?>
