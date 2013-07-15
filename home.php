<?php get_header(); ?>

<div id="banner">
	<span class="prev"></span>
	<span class="next"></span>
	<ul>
		<?php query_posts('category_name=banner'); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();    
		 $args = array(
		   'post_type' => 'attachment',
		   'numberposts' => -1,
		   'post_status' => null,
		   'post_parent' => $post->ID
		  );
		  $attachments = get_posts( $args );
		     if ( $attachments ) {
		        foreach ( $attachments as $attachment ) {
		        	$img_data = wp_get_attachment_image_src($attachment->ID, 'full', false);
		        	echo '<li style="background:url(' .$img_data[0]. ') 100% 450px no-repeat; background-position: center center; background-size: cover;" ></li>';
		          }
		     }
		 endwhile; endif; ?>
	</ul>
	
</div>

	<div id="main">

		<div class="flag-stripe"><span class="white"><span class="red" /></span></div>

			<div class="maincontent">
			
			<?php $count = 1; ?>
			<?php query_posts(array('category_name' => 'frettir', 'showposts' => 3, 'order' => 'DESC')); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="span6 <?php if($count % 3 == 0) echo 'clearfix'; ?>" >
					<?php get_template_part( 'content', get_post_format() ); ?>
				</div>
				<?php $count++; ?>
			<?php endwhile; ?>
			
			<div class="span6">
				<div class="shortcut-links">
					<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fréttir' ) ) ); ?>" title="Fleiri fréttir" class="news-archive-button">Fleiri fréttir &rarr;</a>
					<div class="links">
						<div class="links-header">
							<h2><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fréttahlekkir' ) ) ); ?>">Fréttatenglar</a></h2>
							<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fréttahlekkir' ) ) ); ?>" class="more-links">Sjá alla tengla</a>
						</div>
						<ul>
							<?php query_posts('category_name=frettahlekkir&showposts=5'); ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<li>
									<?php get_template_part( 'newslinks', get_post_format() ); ?>
								</li>
								<?php $count++; ?>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</div>



		
		</div>
	</div> <!-- END #main -->
	<div class="contact-test"></div>
<?php get_footer(); ?>


