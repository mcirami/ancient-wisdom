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

					<div class="outer_hero">
						<div class="hero_background"></div>
					</div>

					<div class="row position-absolute hero">
						<div class="col-12">
							<div class="container">
								<div class="row">
									<div class="col-9 col-lg-7 ml-auto">
										<h2 class="animated fadeIn duration4"><?php echo $headerSection['hero_title']; ?></h2>
										<h3 class="animated fadeIn duration4"><?php echo $headerSection['hero_sub_title']; ?></h3>
										<!--<div class="firefly"></div>
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
										<div class="firefly"></div>-->
									</div>
								</div>
							</div>
						</div>

					</div><!-- hero -->
				<div class="row link_wrap">
					<div class="col-12 text-center">
						<p>Go To Free Lessons</p>
						<a class="rounded-circle scroll_to_section" href="#free_lessons_section">
							<img src="<?php echo bloginfo( 'template_url' ); ?>/images/icon-arrow-down.png"/>
						</a>
					</div>
				</div>
			</section>



			<?php endif; ?>

			<?php $videosHeader = get_field('videos_header_section');

			if($videosHeader) : ?>

				<section class="intro_text row">
					<article class="col-12">
						<div class="container">
							<div class="content_wrap">
								<h3 class="animated fadeIn duration4 eds-on-scroll"><?php echo $videosHeader['video_section_heading']; ?></h3>
								<p class="animated fadeIn duration4 eds-on-scroll"><?php echo $videosHeader['video_section_description']; ?></p>
							</div>
						</div>
					</article>
				</section><!-- motto -->

			<?php endif; ?>

		<?php get_template_part( 'content', 'free-lessons' ); ?>

		<?php $aboutSection = get_field('about_section');

		if($aboutSection) : ?>
			<section class="about_section row mt-5 mt-md-0">
				<div class="col-12">
					<div class="container">
						<div class="row">
							<article class="col-12 col-md-6 column text-center text-md-left">
								<h2 class="mb-2 animated fadeIn duration4 eds-on-scroll"><?php echo $aboutSection['heading']; ?></h2>
								<p class="animated fadeIn duration4 eds-on-scroll"><?php echo $aboutSection['description']; ?></p>
							</article>
							<article class="col-12 col-md-6 column animated fadeIn duration4 eds-on-scroll">
								<?php $image = $aboutSection['image']; ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
							</article>
						</div>

						<?php get_template_part( 'content', 'mailchimp-form' ); ?>

					</div>
				</div>
			</section>

		<?php endif; ?>

	</div>
<?php get_footer(); ?>