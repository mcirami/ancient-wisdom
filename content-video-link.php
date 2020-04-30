<?php
$videoLink = get_field('video_link');

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



			<?php
			$attachment_id =  get_field('video_image');
			$size = "video-thumb";
			$videoImage = wp_get_attachment_image_src( $attachment_id, $size );

			if (!empty($videoImage)) :
				?>

				<img src="<?php echo $videoImage[0]; ?>" alt="video image placeholder">

			<?php elseif ($type == "youtube") : ?>

				<img src="https://img.youtube.com/vi/<?php echo $embedCode; ?>/mqdefault.jpg" alt="youtube video thumbnail">

			<?php else : ?>

				<img src="<?php echo bloginfo('template_url'); ?>/images/video-placeholder.jpg" alt="video image placeholder"/>

			<?php endif; ?>
			<div class="play_button_wrap video_open position-absolute " data-video="<?php echo $embedLink; ?>">
				<div class="img_wrap m-auto">
					<img class="play_button m-auto video_open_img" src="<?php echo bloginfo( 'template_url' ); ?>/images/icon-play.png"/>
				</div>
			</div>

