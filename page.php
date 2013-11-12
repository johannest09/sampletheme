<?php get_header(); ?>
	<div id="main" role="main">
		<div class="row">
			<div class="span3">
				<div class="left-panel">
					<?php get_template_part('subnavigation'); ?>
				</div>
			</div>
			<div class="span9">
				<div class="content">
					<?php the_title('<div class="heading"><h1>','</h1></div>'); ?>
					<div class="main">
						
						<?php while ( have_posts() ): the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; ?>
						
						<?php
							
							if ( is_user_logged_in()) {
								if(is_page(get_page_by_title("Gögn stjórnarmanna")->ID)) {
									get_template_part("fundargerdir-til-samthykktar");
								}
							}

						?>
	
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>