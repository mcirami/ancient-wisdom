<?php
/**
 * Template Name: Home
 *
 * The template for displaying home page.
 *
 *
 * @package boiler
 */
/*
Section Title
Video Image
Video Link
Video Description
*/
get_header(); ?>

	<div class="home_section row">

		<?php $headerSection = get_field('header_section');

			if($headerSection) : ?>

			<section class="col-12">
				<div class="row hero" style="background:url(<?php if(!empty($headerSection['hero_image'])){echo $headerSection['hero_image']['url'];} ?>) no-repeat;background-size: cover;background-position: center 44%;">
					<div class="col-12 ml-auto">
						<div class="container">
							<article class="row">
								<div class="col-7 ml-auto">
									<h2><?php echo $headerSection['hero_title']; ?></h2>
									<h3><?php echo $headerSection['hero_sub_title']; ?></h3>
								</div>
							</article>
						</div>
					</div>
				</div>
			</section><!-- hero -->

			<?php endif; ?>

			<?php $videosHeader = get_field('videos_header_section');

			if($videosHeader) : ?>

				<section class="intro_text row" id="free_lessons">
					<article class="col-12">
						<div class="container">
							<?php /*$quoteBackground = get_field('quote_section_background_image'); */?>
							<div class="content_wrap">
								<h3><?php echo $videosHeader['video_section_heading']; ?></h3>
								<p><?php echo $videosHeader['video_section_description']; ?></p>
							</div>
						</div>
					</article>
				</section><!-- motto -->

			<?php endif; ?>

		<?php get_template_part( 'content', 'free-videos' ); ?>

		<?php $aboutSection = get_field('about_section');

		if($aboutSection) : ?>
			<section class="about_section row">
				<div class="col-12">
					<div class="container">
						<div class="row">
							<article class="col-6 column">
								<h2><?php echo $aboutSection['heading']; ?></h2>
								<p><?php echo $aboutSection['description']; ?></p>
								<!--<p class="bold desktop"><?php /*echo the_field('about_form_text_desktop'); */?></p>
								<p class="bold mobile"><?php /*echo the_field('about_form_text_mobile'); */?></p>
								--><?php /*echo the_field('email_form_shortcode'); */?>
							</article>
							<article class="col-6 column">
								<?php echo $aboutSection['embedded_video']; ?>
								<!--<div class="video_wrapper full_width">
									<iframe src="<?php /*echo the_field('about_video_link'); */?>" frameborder="0" allowfullscreen></iframe>
								</div>-->
							</article>
						</div>
					</div>
				</div>
			</section>

		<?php endif; ?>

	</div>
<?php get_footer(); ?>