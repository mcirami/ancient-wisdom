<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<?php get_template_part( 'content', 'page-header' ); ?>

			<?php /*get_template_part( 'content', 'member-videos' ); */?>

			<!--<h1><?php /*_e( 'Categories for ', 'html5blank' ); single_cat_title(); */?></h1>-->
			<div class="member_lessons">
				<div class="container">
					<div class="video_list">
						<?php get_template_part('loop'); ?>
					</div>
				</div>
				<?php /*get_template_part('pagination'); */?>
			</div>
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
