<div class="row mb-5">
	<div class="col-12">
		<div class="container">
			<div class="form_wrapper mailchimp mt-5 animated fadeIn duration4 eds-on-scroll">
				<div class="row">
					<div class="col-12 col-xl-10 mx-auto d-flex align-content-center justify-content-center mb-4">
						<img class="mr-4 d-none d-md-block" src="<?php echo bloginfo( 'template_url' ); ?>/images/double-arrows.png"/>
						<h4>Enter Your Information Below To Get Free Lessons Delivered To Your Inbox</h4>
						<img class="ml-4 d-none d-md-block" src="<?php echo bloginfo( 'template_url' ); ?>/images/double-arrows.png"/>
					</div>
				</div>
				<?php
				if($_SERVER['HTTP_HOST'] === 'wisdom.test' ) :
					echo do_shortcode('[mc4wp_form id="266"]');
				else:
					echo do_shortcode('[mc4wp_form id="302"]');
				endif; ?>

			</div>
		</div>
	</div>
</div>