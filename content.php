<?php
/*
* The default template for displaying content
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<!-- checks if the current post is a Sticky Post meaning the "Stick this post to the front page" check box has been checked for the post. -->
		<?php if ( is_sticky() ) : ?>
			<hgroup>
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Hlakkur á %s', 'gardyrkja' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				<h4 class="entry-format"><?php _e( 'Featured', 'gardyrkja' ); ?></h4>
			</hgroup>
		<?php else : ?>
		<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Hlekkur á %s', 'gardyrkja' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<?php endif; ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php gardyrkja_posted_on(); ?>
			</div>
		<?php endif; ?>

	</header>
	
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	<?php else : ?>
	<div class="entry-content">
		<?php if ( has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="thumbnail" >
				<?php the_post_thumbnail('thumbnail'); ?>
			</a>
		<?php endif; ?>

		<?php echo excerpt(50); ?>
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Hlekkur á %s', 'gardyrkja' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark" class="more">meira</a>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'gardyrkja' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div>
	<?php endif; ?>
	
	
	
</article>

