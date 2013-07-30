<?php
/*
* The default template for displaying content
*/
?>

<article>
	<header class="entry-header">
		<!-- checks if the current post is a Sticky Post meaning the "Stick this post to the front page" check box has been checked for the post. -->
		<?php if ( is_sticky() ) : ?>
			<hgroup>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'sampletheme' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<h3 class="entry-format"><?php _e( 'Featured', 'sampletheme' ); ?></h3>
			</hgroup>
		<?php else : ?>

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'sampletheme' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php endif; ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php sampletheme_posted_on(); ?>
			</div>
		<?php endif; ?>

	</header>
	
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	<?php else : ?>
	<div class="entry-content">
		<?php 
			if(has_post_thumbnail()) {
				the_post_thumbnail('thumbnail');
			}
		?>
		<?php echo excerpt(50); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'sampletheme' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div>
	<?php endif; ?>
	<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'sampletheme' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark" class="more">Nánar</a>
	
	
</article>

