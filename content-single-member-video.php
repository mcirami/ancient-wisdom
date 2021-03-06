<div class="video row">

	<div class="col-12 col-md-6 column">

		<?php $videoLink = get_field('video_link');

		if (strpos($videoLink, "embed") !== false) {
			$embedLink = $videoLink;
		} elseif (strpos($videoLink, "v=") !== false) {
			$str = explode("v=", $videoLink);
			$embedCode = preg_replace('/\s+/', '', $str[1]);
			$embedLink =  "https://www.youtube.com/embed/" . $embedCode;
		} elseif (strpos($videoLink, "youtu.be") !== false) {
			$str = explode(".be/", $videoLink);
			$embedCode = preg_replace('/\s+/', '', $str[1]);
			$embedLink =  "https://www.youtube.com/embed/" . $embedCode;
		} else {
			$embedLink = null;
		}


		if ($embedLink != null) :

			?>
			<div class="video_wrapper">
				<iframe src="<?php echo $embedLink; ?>/?rel=0&showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
			</div>

		<?php else : ?>

			<img src="<?php echo bloginfo('template_url'); ?>/images/video-placeholder.jpg"/>

		<?php endif; ?>

	</div>
	<div class="col-12 col-md-6 column">
		<h3><?php the_title(); ?></h3>
		<?php $author = get_the_author_meta('user_login'); ?>
		<h4>Submitted by <?php echo $author; ?></h4>
		<p><?php the_field('description'); ?></p>
	</div>
</div>