<?php get_header(); ?>
	<div id="main">
		<div class="row">
			
			<div class="archive">
				<?php if (have_posts()) : ?>
					<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
					
					<div class="heading">
						<h1>Fréttayfirlit - <?php the_time('F, Y'); ?></h1>
					</div>
					<!--div class="back-to-archives"><a href="/?page_id=107">Til baka</a></div-->
					<div class="back-to-archives"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fréttir' ) ) ); ?>">Til baka</a></div>
					
					<?php while (have_posts()) : the_post(); ?>
						<div <?php post_class('archive-item') ?>>
							<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
							<div class="entry"><?php the_excerpt(); ?></div>
						</div>
					<?php endwhile; ?>
					
					<div class="back-to-archives"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fréttir' ) ) ); ?>">Til baka</a></div>
				<?php else : ?>
					<p>Ekkert fannst</p>
					<div class="back-to-archives"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fréttir' ) ) ); ?>">Til baka</a></div>

				<?php endif; ?>
			</div>
			
		</div>
	</div><!-- end #main -->
<?php get_footer(); ?>