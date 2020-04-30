<?php
/**
 * Template Name: Basic Full Page
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

<?php $image = get_field('image');

	if($image) :

?>
		<div class="row">
			<div class="col-12 text-center">
				<div class="container">
					<a target="_blank" class="m-auto d-inline-block" href="<?php the_field('button_link'); ?>">
						<img class="img-fluid" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
					</a>
				</div>
			</div>
		</div>

	<?php endif; ?>
	<?php if(get_field('button_link')) : ?>
		<div class="row my-5">
			<div class="col-12 text-center my-5">
				<div class="container">
					<a class="py-5 button square green w-50 m-auto d-block larger_font" <?php if(get_field('open_in_new_tab') == true) echo "target='_blank'";?> href="<?php the_field('button_link');?>">
						<?php the_field('button_text'); ?>
					</a>
				</div>
			</div>
		</div>
	<?php endif; ?>

<?php get_footer(); ?>
