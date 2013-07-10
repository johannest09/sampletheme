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
			</div><!-- .entry-meta -->
		<?php endif; ?>

		
	</header><!-- .entry-header -->
	
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>

	<div class="entry-content">
		<?php the_post_thumbnail(); ?>
		<!--?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sampletheme' ) ); ?-->
		<?php the_excerpt(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'sampletheme' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>
	<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'sampletheme' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark" class="more">Nánar</a>
	
	
</article>

