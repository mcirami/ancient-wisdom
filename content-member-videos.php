<?php

	$type = null;
	$videoLink = get_field('video_link');
	$id = $post->ID;

	if (strpos($videoLink, "youtube") !== false) {
		if(strpos($videoLink,"v=")) {
			$str = explode("v=", $videoLink);
			$embedCode = preg_replace('/\s+/', '',$str[1]);
		} else if (strpos($videoLink, "embed/")) {
			$str = explode("embed/", $videoLink);
			$embedCode = preg_replace('/\s+/', '',$str[1]);
		} else if (strpos($videoLink, "youtu.be")) {
			$str = explode(".be/", $videoLink);
			$embedCode = preg_replace('/\s+/', '',$str[1]);
		}
		$type = "youtube";
	} elseif (strpos($videoLink, "vimeo") !== false) {
		$str       = explode( "video/", $videoLink );
		$embedCode = preg_replace( '/\s+/', '', $str[1] );
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

	/*$levels = get_the_terms($post->ID, 'level');

	if (is_array($levels) || is_object($levels)) {
		foreach ($levels as $level) {
			$taxonomies[$index] = intval($level->term_id);
			$index++;
		}
	}*/

	$totalCount = count($taxonomies);
	$hash = $post->post_name;
?>

<div class="column filtr-item" data-sort="value" data-category="<?php
foreach ($taxonomies as $taxonomy) {
	echo $taxonomy;
	$count++;
	if ($count < $totalCount) {
		echo ", ";
	}

} ?>" >

	<div class="vid_image_wrap">

		<?php /*if ($type == 'youtube') : */?><!--

			<a id="<?php /*echo $hash; */?>" class="video_open" data-type="<?php /*echo "youtube";*/?>" data-video="<?php /*echo $videoLink; */?>/?rel=0&showinfo=0&autoplay=1" data-title="<?php /*echo the_title();*/?>" data-postid="<?php /*echo $id; */?>" href="#<?php /*echo $hash;*/?>">

		<?php /*elseif ($type == 'vimeo') : */?>

			<a id="<?php /*echo $hash; */?>" class="video_open" data-type="<?php /*echo "vimeo";*/?>" data-video="<?php /*echo $videoLink; */?>/?autoplay=1" data-title="<?php /*echo the_title();*/?>" data-postid="<?php /*echo $id; */?>" href="#<?php /*echo $hash;*/?>">

		--><?php /*endif; */?>

					<?php
					$attachment_id = get_field('video_image');
					$size = "video-thumb";
					$videoImage = wp_get_attachment_image_src( $attachment_id, $size );

					if (!empty(get_the_post_thumbnail())) {
						$postThumbnail = get_the_post_thumbnail();
					}

					if (!empty($videoImage)) :
						?>
						<img src="<?php echo $videoImage[0]; ?>" alt="video thumbnail" id="<?php echo $hash; ?>" class="video_open" data-type="<?php /*echo "youtube";*/?>" data-video="<?php echo $videoLink; ?>/?rel=0&showinfo=0&autoplay=1" data-title="<?php /*echo the_title();*/?>" data-postid="<?php /*echo $id; */?>"/>

						<?php  //elseif ( !empty($video_thumbnail) ) : ?>

						<!--<img class="get_video_thumbnail" src="<?php /*echo $video_thumbnail; */?>" alt="">-->

					<?php /*elseif (!empty($postThumbnail)) :

						echo $postThumbnail;*/

					else : ?>

					<?php if ($type == 'youtube') { ?>

						<img src="https://img.youtube.com/vi/<?php echo $embedCode; ?>/mqdefault.jpg" alt="video thumbnail" id="<?php echo $hash; ?>" class="video_open" data-type="<?php /*echo "youtube";*/?>" data-video="<?php echo $videoLink; ?>/?rel=0&showinfo=0&autoplay=1" data-title="<?php /*echo the_title();*/?>" data-postid="<?php /*echo $id; */?>"/>
						<!--<img src="https://img.youtube.com/vi/<?php /*echo $embedCode; */?>/mqdefault.jpg" alt="youtube video thumb" />-->

					<?php } /*else { */?><!--

						<img src="<?php /*echo bloginfo('template_url'); */?>/images/lessons-screenshot.jpg" />

					--><?php /*} */?>


					<?php endif; ?><!-- video thumbnail -->

				<!--</a>-->

			<div class="button_wrap full_width">
				<?php the_favorites_button();?>
			</div>
	</div>

	<div class="lesson_content full_width">
		<h4><?php the_field('video_description'); ?></h4>
		<p>Date Added <?php echo get_the_date('n/j/Y'); ?></p>
	</div>

</div><!-- column -->