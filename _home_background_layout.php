<?php get_header(); ?>
<div class="background">
	
	<div class="wrap">
		<div id="banner">
			<!--span class="prev"></span-->
			<!--span class="next"></span-->
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
				        	echo '<li style="background:url(' .$img_data[0]. ') 100% 350px no-repeat; background-position: center center; background-size: cover;" ></li>';
				          	//echo '<li style="background:url(' .$img_data[0]. ') no-repeat;" ></li>';
				          }
				     }
				 endwhile; endif; ?>
			</ul>
		</div>
	</div>
	<div id="main">

		<div class="flag-stripe"><div class="white-stripe"><div class="red-stripe"></div></div></div>
		<div class="maincontent">
			<div class="span6">
				<div class="left">
					<div class="headline"><h2>Nýjustu fréttir</h2><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fréttir' ) ) ); ?>" class="more">Sjá allar fréttir</a></div>
					<?php query_posts(array('category_name' => 'frettir', 'showposts' => 3, 'order' => 'DESC')); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
				</div>
			</div>
		
			<div class="span6">
				<div class="right">
					<div class="row">
						<div class="shortcut-links">
							<div class="headline"><h2>Fréttatenglar</h2></div>
							<div class="links">
								<!--div class="links-header">
									<h2><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fréttahlekkir' ) ) ); ?>">Fréttatenglar</a></h2>
									<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fréttahlekkir' ) ) ); ?>" class="more-links">Sjá alla tengla</a>
								</div-->
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
					<div class="row">
						<div class="instagram">
							<iframe src="http://www.intagme.com/in/?h=aGpvbGFkfGlufDgwfDR8M3x8bm98NXx1bmRlZmluZWQ=" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:340px; height: 255px" ></iframe>
						</div>
					</div>
					<div class="row">
						<div class="shortcut-buttons">
							<div class="span6"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Samstarfssjóður' ) ) ); ?>" class="shortcut-button big green">Samstarfssjóður</a></div>
							<div class="span6"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fánaröndin' ) ) ); ?>" class="shortcut-button big blue">Fánaröndin</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- END #main -->
	
	<div class="contact-test"></div>
</div><!-- end background -->
<?php get_footer(); ?>


