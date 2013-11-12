
<aside class="sidebar-right">
	<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fréttir' ) ) ); ?>" class="archive-page-link">Fleiri fréttir</a>

	<div class="latest-news">
		<?php query_posts('category_name=frettir&showposts=4'); ?>
		<!--?php query_posts( $query_string . '&cat=category_name=frettir&monthnum=' . date( 'n', current_time('timestamp')) ); ?-->
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'newslist', get_post_format() ); ?>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</div>
</aside>