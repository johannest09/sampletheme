<?php
/*
 * Template Name: Contact form
 * Description: A Page Template with a darker design.
 */

// Code to display Page goes here...
?>
<!DOCTYPE HTML>


<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset');?>">

		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url') ?>" />
		<link rel="stylesheet" type="text/css" media="all" href="/wp-content/themes/sampletheme/css/colorbox.css" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript">
		</script>
		<![endif]-->

		<?php
			/* We add some JavaScript to pages with the comment form
			 * to support sites with threaded comments (when in use).
			 */
			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );
			
			wp_head();
		?>
	</head>
	<body>
		<div id="contactform">
			<?php while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
		<?php wp_footer(); ?>
		<script src="<?php echo get_template_directory_uri(); ?>/js/lib.js" type="text/javascript"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js" type="text/javascript"></script>
	</body>
</html>