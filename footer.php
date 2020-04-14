			<!-- footer -->
			<footer class="footer row" role="contentinfo">
				<div class="col-12">
					<div class="container">
						<div class="row">
							<div class="col-4">
								<div class="row">
									<div class="col-12 pr-5">
										<h3 class="text-uppercase">The School Of Ancient Wisdom</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam at est eveniet facere illo libero maxime modi nemo nihil numquam pariatur quas qui quis quos ratione, reprehenderit ut, veniam.</p>
									</div>
								</div>
								<div class="row social_media">
									<div class="col-12">
										<ul class="list-unstyled list-inline">
											<li class="list-inline-item">
												<a href="https://www.youtube.com/channel/UCY1wCmrd3Fk1VOq4ZWdaJIw">
													<img class="w-auto" src="<?php echo bloginfo( 'template_url' ); ?>/images/icon-youtube.jpg"/>
												</a>
											</li>
											<li class="list-inline-item">
												<a href="https://twitter.com/CycleofMind">
													<img class="w-auto" src="<?php echo bloginfo( 'template_url' ); ?>/images/icon-twitter.jpg"/>
												</a>
											</li>
											<li class="list-inline-item">
												<a href="https://www.facebook.com/The-Cycle-of-Mind-814341658912882">
													<img class="w-auto" src="<?php echo bloginfo( 'template_url' ); ?>/images/icon-facebook.jpg"/>
												</a>
											</li>
											<li class="list-inline-item">
												<a href="https://www.instagram.com/thecycleofmind/">
													<img class="w-auto" src="<?php echo bloginfo( 'template_url' ); ?>/images/icon-instagram.jpg"/>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="row copy">
									<div class="col-12">
										<p>
											&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>
										</p>
										Created by <a href="https://mscwebservices.net" title="MSCWebServicesLLC">MSC Web Services, LLC</a>
										<!-- /copyright -->
									</div>
								</div>



							</div>
							<div class="col-3 quick_links">
								<h3 class="text-uppercase">Quick Links</h3>
								<?php if (is_user_logged_in()): ?>

									<?php wp_nav_menu( array( 'theme_location' => 'footer-menu-member', 'container' => false, 'menu_class' => 'footer-menu' ) ); // remember to assign a menu in the admin to remove the container div ?

								else : ?>

									<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => false, 'menu_class' => 'footer-menu' ) ); // remember to assign a menu in the admin to remove the container div ?>

								<?php endif; ?>
							</div>
							<div class="col-5">
								<div class="row book p-4">
									<div class="col-6">
										<a href="<?php home_url(); ?>/the-cycle-of-mind">
											<img src="<?php echo bloginfo( 'template_url' ); ?>/images/book-cover.jpg"/>
										</a>
									</div>
									<div class="col-6 text-center d-flex flex-column justify-content-center align-content-center">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, molestias numquam porro possimus praesentium repellendus voluptas. </p>
										<a class="button orange text-uppercase" href="<?php home_url(); ?>/the-cycle-of-mind">Learn More</a>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

			</footer>
			<!-- /footer -->

		<!--</div>-->
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>
	</body>
</html>
