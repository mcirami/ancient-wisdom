<?php
/**
 * Template Name: Membership Plans
 *
 * The template for displaying Membership Plans.
 *
 *
 * @package boiler
 */
/*

*/

get_header();

?>

<?php get_template_part( 'content', 'page-header' ); ?>
<div class="main">
	<div class="row text-center mb-0 mb-lg-5 pb-0 pb-lg-5">
		<div class="col-12">
			<div class="container">
				<p><?php the_field('top_description', 'options'); ?></p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="container">

				<div class="mepr-price-menu classic_dark classic">
					<div class="mepr-price-boxes mepr-3-col">
						<div id="mepr-price-box-37" class="mepr-price-box ">
							<div class="mepr-most-popular">Most Popular</div>
							<div class="mepr-price-box-head">
								<div class="mepr-price-box-title">Monthly Membership</div>
								<div class="mepr-price-box-price">
									<strike>$19.99/mo</strike>$9.99/mo
								</div>
								<div class="mepr-price-box-heading">Monthly Membership</div>
							</div>
							<div class="mepr-price-box-benefits">
								<div class="mepr-price-box-benefits-list">
									<?php if ( have_rows( 'monthly_membership_benefits', 'options' ) ) : ?>
										<?php while ( have_rows( 'monthly_membership_benefits', 'options' ) ) : the_row(); ?>
											<div class="mepr-price-box-benefits-item"><?php the_sub_field('benefit_text', 'options'); ?></div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>
							<div class="mepr-price-box-foot">
								<div class="mepr-price-box-footer"></div>
								<div class="mepr-price-box-button">
									<a href="<?php echo home_url(); ?>/register/monthly-membership/" class="">Sign Up</a>
								</div>
							</div>
						</div>
						<div id="mepr-price-box-38" class="mepr-price-box ">
							<div class="mepr-most-popular">Most Popular</div>
							<div class="mepr-price-box-head">
								<div class="mepr-price-box-title">Annual Membership</div>
								<div class="mepr-price-box-price">
									<strike>$249/yr</strike>$99.99/yr
								</div>
								<div class="mepr-price-box-heading">Try our Annual Now.</div>
							</div>
							<div class="mepr-price-box-benefits">
								<div class="mepr-price-box-benefits-list">
									<?php if ( have_rows( 'yearly_membership_benefits', 'options' ) ) : ?>
										<?php while ( have_rows( 'yearly_membership_benefits', 'options' ) ) : the_row(); ?>
											<div class="mepr-price-box-benefits-item"><?php the_sub_field('benefit_text', 'options'); ?></div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>
							<div class="mepr-price-box-foot">
								<div class="mepr-price-box-footer"></div>
								<div class="mepr-price-box-button">
									<a href="<?php echo home_url(); ?>/register/annual-membership/" class="">Sign Up</a>
								</div>
							</div>
						</div>
						<div id="mepr-price-box-39" class="mepr-price-box highlighted">
							<div class="mepr-most-popular">Most Popular</div>
							<div class="mepr-price-box-head">
								<div class="mepr-price-box-title">Lifetime Membership</div>
								<div class="mepr-price-box-price">
									$279.99
								</div>
								<div class="mepr-price-box-heading">Join for a lifetime!</div>
							</div>
							<div class="mepr-price-box-benefits">
								<div class="mepr-price-box-benefits-list">
									<?php if ( have_rows( 'lifetime_membership_benefits', 'options' ) ) : ?>
										<?php while ( have_rows( 'lifetime_membership_benefits', 'options' ) ) : the_row(); ?>
											<div class="mepr-price-box-benefits-item"><?php the_sub_field('benefit_text', 'options'); ?></div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>
							<div class="mepr-price-box-foot">
								<div class="mepr-price-box-footer"></div>
								<div class="mepr-price-box-button">
									<a href="<?php echo home_url(); ?>/register/lifetime-membership/" class="">Sign Up</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row text-center my-3 my-lg-5 py-3 py-lg-5">
					<div class="col-12">
						<div class="container">
							<p><?php the_field('bottom_description', 'options'); ?></p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>