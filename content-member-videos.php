<?php

	$videoLink = get_field('video_link');
	$id = $post->ID;

	if(strpos($videoLink,"v=")) {
		$str = explode("v=", $videoLink);
		$embedCode = preg_replace('/\s+/', '',$str[1]);
		$type = "youtube";
	} else if (strpos($videoLink, "embed/")) {
		$str = explode("embed/", $videoLink);
		$embedCode = preg_replace('/\s+/', '',$str[1]);
		$type = "youtube";
	} else if (strpos($videoLink, "youtu.be")) {
		$str = explode(".be/", $videoLink);
		$embedCode = preg_replace('/\s+/', '',$str[1]);
		$type = "youtube";
	} else if (strpos($videoLink, "vimeo") !== false) {
		$str       = explode( "vimeo.com/", $videoLink );
		$embedCode = preg_replace( '/\s+/', '', $str[1]);
		$type      = "vimeo";
	}

	$count = 0;
	$taxonomies = [];
	$index = 0;

	$categories = get_the_category();

	foreach ($categories as $category) {
		$taxonomies[$index] = intval($category->term_id);
		$index++;
	}

	$totalCount = count($taxonomies);
	$hash = $post->post_name;
?>

<div class="column">

	<div class="vid_image_wrap">

		<?php
		$attachment_id = get_field('video_image');
		$size = "video-thumb";
		$videoImage = wp_get_attachment_image_src( $attachment_id, $size );

		/*if (!empty(get_the_post_thumbnail())) {
			$postThumbnail = get_the_post_thumbnail();
		}*/

		if (!empty($videoImage)) : ?>

			<img src="<?php echo $videoImage[0]; ?>" alt="video image placeholder" id="<?php echo $hash; ?>"/>

		<? elseif ($type == 'youtube')  : ?>

				<img src="https://img.youtube.com/vi/<?php echo $embedCode; ?>/mqdefault.jpg" alt="youtube video thumbnail" id="<?php echo $hash; ?>"/>

		<?php else : ?>

			<img src="<?php echo bloginfo('template_url'); ?>/images/video-placeholder.jpg" alt="video image placeholder"/>

		<?php endif; ?><!-- video thumbnail -->

		<div class="button_wrap row">
			<div class="col-12">
				<?php the_favorites_button();?>
			</div>
		</div>
		<div class="play_button_wrap video_open position-absolute w-100 h-100 d-flex justify-content-center align-content-center" data-video="<?php echo $videoLink; if ($type == "vimeo") echo '/?autoplay=1'; else echo '/?rel=0&showinfo=0&autoplay=1'; ?>">
			<div class="img_wrap m-auto">
				<img class="play_button video_open_img" src="<?php echo bloginfo( 'template_url' ); ?>/images/icon-play.png" />
			</div>
		</div>
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