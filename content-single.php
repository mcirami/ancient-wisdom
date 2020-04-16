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

?>

<div class="row">
	<div class="col-12 col-md-10 mx-auto">
		<div class="row">
			<div class="col-12 text-left mb-4">
				<?php the_content(); // Dynamic Content ?>
			</div>
		</div>

		<div class="video_wrapper">
			<?php
				if ($type == "youtube") :
			?>

					<iframe src="https://www.youtube.com/embed/<?php echo $embedCode; ?>" frameborder="0"></iframe>

				<?php else : ?>

					<iframe src="<?php echo $videoLink; ?>" frameborder="0"></iframe>

				<?php endif; ?>

		</div>
	</div>
</div>
