<?php
/*
 * Template Name: Hlekkjasafn
 * Description: Birtir hlekkjasafn
 */
get_header(); ?>
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
				<div class="heading"><h1><?php the_title(); ?></h1></div>
				<div class="main">
					<?php while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
					<div class="links">
						
						<ul>
							<?php $args = array(
							'show_images'	   => 0,
							'limit'			   => 5,
							'show_description' => 1,
						    'orderby'          => 'name',
						    'order'            => 'ASC',
						    'category'         => '',
						    'exclude_category' => '',
						    'category_name'    => '',
						    'hide_invisible'   => 1,
						    'show_updated'     => 0,
						    'categorize'       => 1,
						    'show_name'		   => 0,
						    'echo'			   => 1,
						    'title_li'         => 0,
						    'title_before'     => '<h2>',
						    'title_after'      => '</h2>',
						    'category_orderby' => 'name',
						    'category_order'   => 'ASC',
						    'class'            => 'linkcat',
						    'category_before'  => '<li id=%id class=%class>',
						    'category_after'   => '<a href="#" class="more">meira</a></li>' ); ?> 
						
							<?php wp_list_bookmarks( $args ); ?>
						</ul>					
					</div>

	            </div>	
			</div>
		</div>
	</div>
</div>



<?php get_footer() ?>