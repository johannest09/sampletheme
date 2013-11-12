
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header">
		<div class="entry-title"><h1><?php the_title(); ?></h1></div>
		<div class="entry-meta"><?php gardyrkja_posted_on(); ?></div>
	</header>
	<div class="entry-content">
		<?php if (has_post_thumbnail()) : ?>
			<?php $hasCaption = (the_post_thumbnail_has_caption($post) == 1) ? "caption" : "no-caption"; ?>
			<div class="main-image <?php echo $hasCaption ?>">
				<?php the_post_thumbnail('medium'); ?>
				<?php 
					if($hasCaption == "caption")
						the_post_thumbnail_caption($post);
				?>
			</div>
		<?php endif; ?>
		<?php the_content(); ?>
	</div>
</article>
