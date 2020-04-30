<?php
$type = null;
$videoLink = get_field('video_link');
$id = $post->ID;

if(strpos($videoLink,"v=") !== false) {
	$str = explode("v=", $videoLink);
	$embedCode = preg_replace('/\s+/', '',$str[1]);
	$type = "youtube";
} else if (strpos($videoLink, "embed/") !== false) {
	$str = explode("embed/", $videoLink);
	$embedCode = preg_replace('/\s+/', '',$str[1]);
	$type = "youtube";
} else if (strpos($videoLink, "youtu.be") !== false) {
	$str = explode(".be/", $videoLink);
	$embedCode = preg_replace('/\s+/', '',$str[1]);
	$type = "youtube";
}else if (strpos($videoLink, "vimeo") !== false) {
	$str       = explode( "vimeo.com/", $videoLink );
	$embedCode = preg_replace( '/\s+/', '', $str[1] );
	$type      = "vimeo";
}

if($type == "youtube") {
	$embedLink = "https://www.youtube.com/embed/" . $embedCode . "/?rel=0&showinfo=0&autoplay=1";
} else {
	$embedLink = "https://player.vimeo.com/video/" . $embedCode . "/?autoplay=1";
}

?>

<div class="row">
	<div class="col-12 col-md-10 mx-auto">
		<div class="row">
			<div class="col-12 text-left mb-4">
				<?php the_content(); // Dynamic Content ?>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="video_wrapper">
					<iframe src="<?php echo $embedLink; ?>" frameborder="0"></iframe>
				</div>
			</div>
		</div>

		<div class="row mb-5 pt-5">
			<div class="col-12">
				<p><?php the_field('video_description');?></p>
			</div>
		</div>
	</div>
</div>
