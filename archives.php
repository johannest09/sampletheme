<?php
/*
 * Template Name: Fréttasafn
 * Description: Birtir fréttasafn flokkað eftir mánuðum og árum
 */

get_header(); ?>
<div id="main">
	<div class="row">
		<div class="span3">
			<div class="left-panel">
				<?php get_sidebar(); ?>
			</div>
		</div>
		<div class="span9">

			<div class="content">
				<div class="heading"><h1><?php the_title(); ?></h1></div>
				<div class="main news">
					<?php while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
					<section class="archive-news">
						<div class="archive-dropdown">
							<label for="archive-dropdown" class="archive-title">Fréttasafn</label>
			                <select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
								<option value=""><?php echo esc_attr( __( 'Veldu mánuð' ) ); ?></option> 								
								<?php wp_get_archives('format=option&cat=' .get_cat_ID('Fréttir'). "'"); ?>
							</select>
		                </div>
					</section>
					
					
	                <section class="lates-news">
	                	<?php query_posts(array('category_name' => 'frettir', 'showposts' => 5, 'order' => 'DESC')); ?>
	                	<?php while ( have_posts() ) : the_post(); ?>
				
							<?php get_template_part( 'content', get_post_format() ); ?>

						<?php endwhile; ?>
	                </section>	
	            </div>	
			</div>
		</div>
	</div>
</div>

<?php get_footer() ?>