<?php
/**
 * Template Name: Testimonials
 *
 * The template for displaying Testimonials Page.
 *
 *
 * @package boiler
 */
/*

*/
get_header(); ?>
<?php get_template_part( 'content', 'page-header' ); ?>

	<section class="row video_text_slider">
		<div class="col-12">
			<div class="container">
				<div id="carouselVideoText" class="carousel slide carousel-fade" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselVideoText" data-slide-to="0" class="active"></li>
						<li data-target="#carouselVideoText" data-slide-to="1"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<article class="row">
								<div class="col-6">
									<img class="video_open" src="<?php echo bloginfo( 'template_url' ); ?>/images/video-placeholder.jpg" data-video="https://www.youtube.com/watch?v=GjeRrJljrHs&list=RDGjeRrJljrHs"/>
									<!--<img class="video_open" src="" alt="<?php /*echo esc_attr( $image['alt'] ); */?>" data-video="<?php /*the_field('video_link'); */?>">-->
								</div>
								<div class="col-6">
									<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi error magnam nulla, omnis porro velit vero vitae! Asperiores distinctio impedit nam numquam odio quaerat sint veniam. Aliquam quam rerum veniam."</p>
									<h4>Gopal</h4>
								</div>
							</article>
						</div>
						<div class="carousel-item">
							<article class="row">
								<div class="col-6">
									<img class="video_open" src="<?php echo bloginfo( 'template_url' ); ?>/images/video-placeholder-slider.jpg" data-video="https://www.youtube.com/watch?v=GjeRrJljrHs&list=RDGjeRrJljrHs"/>
									<!--<img class="video_open" src="" alt="<?php /*echo esc_attr( $image['alt'] ); */?>" data-video="<?php /*the_field('video_link'); */?>">-->
								</div>
								<div class="col-6">
									<p>“ Alan I love the topics you're covering, and I love the convenience of the video library. I've been doing the exercises for just a few days, and I can tell you I am already becoming more self-aware. I know I have a lot of negative self-beliefs to overcome, but I definitely feel like this is working - and it's only been a few days. I can't wait to see where my life will be in the future! ”</p>
									<h4>Bobby</h4>
								</div>
							</article>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="row text_slider">
		<div class="col-12">
			<div class="container">
				<div id="carouselText" class="carousel slide carousel-fade" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<article class="row d-flex">
								<div class="col-5 mr-5 ml-auto">
									<div class="text_box d-flex">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi error magnam nulla, omnis porro velit vero vitae! Asperiores distinctio impedit nam numquam odio quaerat sint veniam. Aliquam quam rerum veniam.</p>
									</div>
									<h4 class="d-block">Gopal</h4>
								</div>
								<div class="col-5 ml-5 mr-auto">
									<div class="text_box">
										<p>Alan I love the topics you're covering, and I love the convenience of the video library. I've been doing the exercises for just a few days, and I can tell you I am already becoming more self-aware. I know I have a lot of negative self-beliefs to overcome, but I definitely feel like this is working - and it's only been a few days. I can't wait to see where my life will be in the future!</p>
									</div>
									<h4 class="d-block">Billy</h4>
								</div>
							</article>
						</div>
						<div class="carousel-item">
							<article class="row d-flex">
								<div class="col-5 mr-5 ml-auto">
									<div class="text_box">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi error magnam nulla, omnis porro velit vero vitae! Asperiores distinctio impedit nam numquam odio quaerat sint veniam. Aliquam quam rerum veniam.</p>
									</div>
									<h4 class="d-block">Gopal</h4>
								</div>
								<div class="col-5 ml-5 mr-auto">
									<div class="text_box">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi error magnam nulla, omnis porro velit vero vitae! Asperiores distinctio impedit nam numquam odio quaerat sint veniam. Aliquam quam rerum veniam.</p>
									</div>
									<h4 class="d-block">Gopal</h4>
								</div>
							</article>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselText" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselText" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<section class="row full_width_video">
		<div class="col-12">
			<img class="video_open" src="<?php echo bloginfo( 'template_url' ); ?>/images/testimonials-video-placeholer.jpg" data-video="https://www.youtube.com/watch?v=GjeRrJljrHs&list=RDGjeRrJljrHs"/>
		</div>
	</section>

<?php get_footer(); ?>
