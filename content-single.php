<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header">
		<div class="entry-meta">
			<?php sampletheme_posted_on(); ?>
		</div><!-- .entry-meta -->
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php if ( 'post' == get_post_type() ) : ?>
		
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_post_thumbnail('single-post-image'); ?>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'sampletheme' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	
</article>