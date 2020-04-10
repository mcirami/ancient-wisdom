<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<!--<div class="wrapper">-->

			<!-- header -->
			<header class="row fixed-top clear">

				<div class="col-12 header_bottom <?php if(!is_front_page()){ echo "background"; } ?>">

					<div class="container">
						<?php if (is_user_logged_in()): ?>
							<a href="/member-home"><h1 class="logo"><img src="<?php echo bloginfo('template_url'); ?>/images/logo.png" /></h1></a>
						<?php else : ?>
							<a href="/"><h1 class="logo"><img src="<?php echo bloginfo('template_url'); ?>/images/logo.png" /></h1></a>
						<?php endif; ?>

						<a class="mobile_menu_icon" href="#">
							<span></span>
							<span></span>
							<span></span>
						</a>
						<div class="menu">

							<nav role="navigation">

								<?php /*if (is_user_logged_in()): */?><!--

									--><?php /*wp_nav_menu( array( 'theme_location' => 'member-menu', 'container' => false, 'menu_class' => 'member_menu' ) ); // remember to assign a menu in the admin to remove the container div ?

								else : */?>

									<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => false, 'menu_class' => 'header_menu' ) ); // remember to assign a menu in the admin to remove the container div ?>

								<?php /*endif; */?>

							</nav>
						</div>
					</div>
				</div>

			</header>
			<!-- /header -->
