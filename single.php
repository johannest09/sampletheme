
<?php get_header(); ?>
	<?php is_singular(); ?> 
		<div id="main" role="main">
			<div class="row">
				<div class="span9">
					<div class="news-item">
						
						<?php while ( have_posts() ) : the_post(); ?>
							
							<?php get_template_part( 'content', 'single', get_post_format() ); ?>

						<?php endwhile; // end of the loop. ?>
					</div>
					<div class="back-to-archives"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fréttir' ) ) ); ?>">Til baka</a></div>
				</div>
				<div class="span3">
					<?php get_sidebar('right'); ?>
				</div>
			</div>
		</div><!-- #main -->


<?php get_footer(); ?>	