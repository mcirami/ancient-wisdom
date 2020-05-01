<div class="column">

	<div class="vid_image_wrap">

		<?php get_template_part('content', 'video-link'); ?>

	</div><!-- vid_image_wrap -->

	<div class="lesson_content row">
		<div class="col-12">
			<a class="video_title text-capitalize pt-2" href="<?php the_permalink();?>"><?php the_title(); ?></a>
			<p>Date Added <?php echo get_the_date('n/j/Y'); ?></p>
		</div>

	</div>

	<div class="row mt-auto">
		<div class="col-12">
			<a class="button green" href="<?php the_permalink(); ?>">Read More / Leave a Comment</a>
		</div>
	</div>

</div><!-- column -->