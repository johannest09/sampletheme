<?php
/*
 * Template Name: Fundargerdir - Blóm
 * Description: Birtir fundargerðir úr flokknum Blóm
 */

get_header(); ?>
<div id="main" class="archive">
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
					<section class="archive-dropdown">
					    <select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
							<?php wp_get_archives('format=option&cat=' .get_cat_ID('Fundargerðir Blóm'). "'"); ?>
						</select>
					</section>
            		<?php
            		    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            			$tmp = $wp_query;
            			$wp_query = null;

            			$args = array(
						    'order'            	=> 'DESC',
						    'category_name'    	=> 'fundargerdir-blom',
						    'posts_per_page'	=> 5,
						    'paged'				=> $paged
					    );
            			$wp_query = new WP_Query($args); 
            			while( $wp_query->have_posts() )
            			{
            				$wp_query->the_post();
            				get_template_part('content', get_post_format() );
            			}
            			wp_reset_postdata();
					?>
					<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
	            </div>	
			</div>
		</div>
	</div>
</div>

<?php get_footer() ?>