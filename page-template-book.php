<?php
/**
 * Template Name: Book
 *
 * The template for displaying Book Page.
 *
 *
 * @package boiler
 */
/*

*/
get_header(); ?>

<?php get_template_part( 'content', 'page-header' ); ?>

		<section class="row book_image">
			<div class="col-6 col-md-12 mx-auto">
				<div class="container">
					<div class="book_wrap">
						<?php $image = get_field('book_image'); ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
						<div class="row book_bottom">
							<div class="col-12 p-0">
								<img class="m-auto" src="<?php echo bloginfo( 'template_url' ); ?>/images/book-bottom-bg.jpg" alt=""/>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>

		<?php $twoColumnSection = get_field('two_column_text');
			if($twoColumnSection) :
		?>
			<section class="row two_column_section mb-5">
				<div class="col-12">
					<div class="container">
						<article class="row extra_padding">
							<div class="col-12 col-md-6">
								<p><?php echo $twoColumnSection['column_one']; ?></p>
							</div>
							<div class="col-12 col-md-6">
								<p><?php echo $twoColumnSection['column_two']; ?></p>
							</div>
						</article>
					</div>
				</div>
			</section>

			<?php endif; ?>

	<?php $buttons = get_field('button_group');
		if($buttons) :
			$count = 0;
	?>      <section class="row button_group">
				<div class="col-12">

					<div class="container">

						<?php if ( have_rows( 'button_group' ) ) : ?>
							<?php while ( have_rows( 'button_group' ) ) : the_row(); ?>

								<?php if ( have_rows( 'buttons' ) ) : ?>

									<?php while ( have_rows( 'buttons' ) ) : the_row();
										++$count
										?>

										<?php if ($count % 2 !== 0) : ?>
											<div class="row buttons extra_padding mb-1 mb-md-5">
										<?php endif; ?>
										<div class="col-12 col-md-6 mb-3 mb-md-0">
												<a class="button square orange" href="<?php esc_url(the_sub_field('button_link'));?>"><?php the_sub_field('button_text');?>
													<?php
														$price = get_sub_field('book_price');
														if($price) :
															echo "$".$price;
														else :
															echo "(Coming Soon)";
														endif
													?>
												</a>
										</div>
										<?php if ($count % 2 == 0) : ?>
											</div>
										<?php endif; ?>

									<?php endwhile; ?>
								<?php endif; ?>

							<?php endwhile; ?>
						<?php endif; ?>
					</div>

				</div>
			</section>
		<?php endif; ?>




<?php get_footer(); ?>
