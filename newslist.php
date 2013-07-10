<article>
	<header class="entry-header">
		<!-- checks if the current post is a Sticky Post meaning the "Stick this post to the front page" check box has been checked for the post. -->
		<?php if ( is_sticky() ) : ?>
			<hgroup>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'sampletheme' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<h3 class="entry-format"><?php _e( 'Featured', 'sampletheme' ); ?></h3>
			</hgroup>
		<?php else : ?>

			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'sampletheme' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<?php endif; ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php sampletheme_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php if ( comments_open() && ! post_password_required() ) : ?>
		<!--div class="comments-link">
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'sampletheme' ) . '</span>', _x( '1', 'comments number', 'sampletheme' ), _x( '%', 'comments number', 'sampletheme' ) ); ?>
		</div-->
		<?php endif; ?>
	</header><!-- .entry-header -->
	
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>
	
</article>

