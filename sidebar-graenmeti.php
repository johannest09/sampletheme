
<aside class="sidebar-right">
	<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fundargerðir' ) ) ); ?>" class="archive-page-link">Fleiri fundargerðir</a>

	<div class="latest-news">
		<?php query_posts('category_name=fundargerdir-graenmeti&showposts=4'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'newslist', get_post_format() ); ?>
		<?php endwhile; ?>
	</div>
</aside>