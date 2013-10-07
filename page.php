<?php get_header(); ?>
	<div id="main">
		<div class="row">
			<div class="span3">
				<div class="left-panel">
					<?php get_template_part('subnavigation'); ?>
				</div>
				
				<!--?php dynamic_sidebar( 'Main Sidebar' ); ?-->
			</div>
			<div class="span9">
				<div class="content">
					<?php the_title('<div class="heading"><h1>','</h1></div>'); ?>
					<div class="main">
						
						<?php while ( have_posts() ): the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>

						<?php
							if ( is_user_logged_in()) {

								$page = get_page_by_title("Fréttahlekkir");
								if(is_page($page->ID)) {
									get_template_part( 'external', 'links', get_post_format());
								}
								$page = get_page_by_title("Fundargerðir");
								if(is_page($page->ID)) {
									get_template_part("fundargerdir");
								}

								if($post->ID == 9929)
								{
									get_template_part("fundargerdir-blom");
								}
								if($post->ID == 9931)
								{
									get_template_part("fundargerdir-gardplontur");
								}
								if($post->ID == 9933)
								{
									get_template_part("fundargerdir-graenmeti");
								}
							}
						?>
	
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>