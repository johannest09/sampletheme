<?php get_header(); ?>

<div id='main'>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<article class="search-item">
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
				<div class="entry">
					<?php the_content(); ?>
				</div>
				<div class="postmetadata">
					<?php the_tags('Tags: ', ', ', '<br />'); ?>
				</div>
			</div>
		</article>

	<?php endwhile; ?>

	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
	
	<?php else : ?>
		<h2>Ekkert fannst</h2>
	<?php endif; ?>
	
</div>


<?php get_footer(); ?>