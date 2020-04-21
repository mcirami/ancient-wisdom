<?php
/**
 * Template Name: Home
 *
 * The template for displaying home page.
 *
 *
 * @package boiler
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
								<div class="col-8 col-lg-7 ml-auto">
									<h2 class="animated fadeIn duration4"><?php echo $headerSection['hero_title']; ?></h2>
									<h3 class="animated fadeIn duration4"><?php echo $headerSection['hero_sub_title']; ?></h3>
									<div class="firefly"></div>
									<div class="firefly"></div>
									<div class="firefly"></div>
									<div class="firefly"></div>
									<div class="firefly"></div>
									<div class="firefly"></div>
									<div class="firefly"></div>
									<div class="firefly"></div>
									<div class="firefly"></div>
									<div class="firefly"></div>
									<div class="firefly"></div>
									<div class="firefly"></div>
									<div class="firefly"></div>
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
								<h3 class="animated fadeIn duration4 eds-on-scroll"><?php echo $videosHeader['video_section_heading']; ?></h3>
								<p class="animated fadeIn duration4 eds-on-scroll"><?php echo $videosHeader['video_section_description']; ?></p>
							</div>
							<div class="form_wrapper mailchimp mt-5 animated fadeIn duration4 eds-on-scroll">
								<div class="row">
									<div class="col-12 col-xl-10 mx-auto d-flex align-content-center justify-content-center mb-4">
										<img class="mr-4 d-none d-md-block" src="<?php echo bloginfo( 'template_url' ); ?>/images/double-arrows.png"/>
										<h4>Enter Your Information Below To Get Free Lessons Delivered To Your Inbox</h4>
										<img class="ml-4 d-none d-md-block" src="<?php echo bloginfo( 'template_url' ); ?>/images/double-arrows.png"/>
									</div>
								</div>
								<?php echo do_shortcode('[mc4wp_form id="266"]'); ?>
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
							<article class="col-12 col-md-6 column text-center text-md-left">
								<h2 class="mb-2 animated fadeIn duration4 eds-on-scroll"><?php echo $aboutSection['heading']; ?></h2>
								<p class="animated fadeIn duration4 eds-on-scroll"><?php echo $aboutSection['description']; ?></p>
								<div class="form_wrapper mailchimp">
									<?php echo do_shortcode('[mc4wp_form id="266"]'); ?>
								</div>
							</article>
							<article class="col-12 col-md-6 column animated fadeIn duration4 eds-on-scroll">
								<?php echo $aboutSection['embedded_video']; ?>
							</article>
						</div>
					</div>
				</div>
			</section>

		<?php endif; ?>

	</div>
<?php get_footer(); ?>