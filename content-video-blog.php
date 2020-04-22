<?php
/**
 * @package boiler
 */
$postType = esc_html(get_post_type());

$videoLink = get_field('video_link');

	if (strpos($videoLink, "embed") !== false) {
		$str = explode("embed/", $videoLink);
		$embedCode = preg_replace('/\s+/', '', $str[1]);
	} elseif (strpos($videoLink, "v=") !== false) {
		$str = explode("v=", $videoLink);
		$embedCode = preg_replace('/\s+/', '', $str[1]);
	} elseif (strpos($videoLink, "youtu.be") !== false) {
		$str = explode(".be/", $videoLink);
		$embedCode = preg_replace('/\s+/', '', $str[1]);
	} else {
		$embedCode = null;
	}

?>


<div class="row">
	<div class="column col-6">

		<?php if ($embedCode !== null) : ?>
			<a href="<?php the_permalink(); ?>">
				<img class="youtube_img" src="https://img.youtube.com/vi/<?php echo $embedCode; ?>/mqdefault.jpg" />
			</a>
		<?php else:  ?>
			<a href="<?php the_permalink(); ?>">
				<img class="default" src="<?php echo bloginfo('template_url'); ?>/images/no-video-placeholder.jpg" />
			</a>
		<?php endif; ?>

	</div>
	<div class="column col-6">
		<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php $author = get_the_author_meta('user_login'); ?>
		<h4>Submitted by <?php echo $author; ?></h4>

		<?php
		$post_id = get_the_ID();
		$commentCount = wp_count_comments( $post_id );
		?>
			<h4>
				<?php  echo "Thread Replies: "; ?>
				<?php echo $commentCount->total_comments; ?>
			</h4>

			<p><?php the_field('description'); ?></p>

		<div class="button_wrap">
			<a class="button blue" href="<?php the_permalink(); ?>">Open Thread</a>
		</div>
	</div>


</div>