
<?php get_header(); ?>
	<?php is_singular(); ?> 
		<?php 
			$category = get_the_category();
		?>
		<div id="main" role="main">
			<div class="row">
				<div class="span9">
					<div class="news-item">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', 'single', get_post_format() ); ?>
						<?php endwhile; ?>
					</div>
					<?php if($category[0]->slug == 'ur-fundargerdum') : ?>
						<div class="back-to-archives"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fundargerðir' ) ) ); ?>">Til baka</a></div>
					<?php else : ?>
						<div class="back-to-archives"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fréttir' ) ) ); ?>">Til baka</a></div>
					<?php endif; ?>
				</div>

				<div class="span3">
					<?php
						if( 'ur-fundargerdum' == $category[0]->slug )
						{
							get_sidebar('fundargerdir');
						}
						elseif ( 'frettir' == $category[0]->slug ) 
						{
							get_sidebar('news');
						}
					?>
				</div>
			</div>
		</div><!-- #main -->

<?php get_footer(); ?>	