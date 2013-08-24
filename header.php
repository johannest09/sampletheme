<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset');?>">

		<?php if (is_search()) { ?>
			<meta name="robots" content="noindex, nofolow" />
		<?php } ?>
		<title>
			<?php /* Print the <title> tag based on what is being viewed. */
			global $page, $paged;
			wp_title( '|', true, 'right' );
			// Add the blog name.
			bloginfo( 'name' );
			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";

			// Add a page number if necessary:
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s', 'sampletheme' ), max( $paged, $page ) );
			?>
		</title>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url') ?>" />
		<link rel="stylesheet" type="text/css" media="all" href="/wp-content/themes/sampletheme/css/colorbox.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.72664.js" type="text/javascript"></script>

		<?php wp_head(); ?>
	</head>

	<body <?php body_class('no-js'); ?>>
		<div class="wrapper">
			<header class="main-header">
				<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>

				<div class="wrap">
					<div class="row">
						<div class="span4"><a href="/" class="logo" title="Heim"><img src="/wp-content/uploads/2013/05/logo.png" alt="heim" /></a></div>
						<!--div class="span5"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Hafðu samband' ) ) ); ?>" class="contact" title="hafa samband">Hafa samband<span class="mail"></span></a></div-->
						<div class="span8">
							<form action="/" method="get" class="searchform">
								<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" placeholder="Leitarorð" />
								<input type="submit" id="searchsubmit" />
							</form>
						</div>
						
						<nav class="mainMenu" role="navigation">

						<?php 
							$args = array(
								'menu'	=> 'MainMenu'
							);
							wp_nav_menu($args);
						?>

						</nav>
					</div>
				</div>
			</header>