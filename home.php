<?php get_header(); ?>

<div id="banner" role="banner">
	<div class="banner-wrap">
		<div class="leftgradient"></div>
		<div class="rightgradient"></div>
		<ul>
			<?php query_posts('category_name=frontpagebanner'); ?>
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
			        	echo '<li style="background:url(' .$img_data[0]. ') 100% 450px no-repeat; background-position: center center;" ></li>';
			        }
			     }
			 endwhile; endif; ?>
		</ul>
	</div>

</div>
<div id="main">

	<div class="flag-stripe"><div class="white-stripe"><div class="red-stripe"></div></div></div>
	<div class="maincontent">
		<div class="frontpage-news">
			<div class="headline">
				<h2><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fréttir' ) ) ); ?>" title="Fara á fréttasíðu">Fréttir</a></h2>
				<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fréttir' ) ) ); ?>" class="more">Sjá allar fréttir</a>
			</div>
			<?php query_posts(array('category_name' => 'frettir', 'showposts' => 3, 'order' => 'DESC')); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
		</div>
		<div class="frontpage-news-links">
			<div class="headline">
				<h2><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Hlekkir' ) ) ); ?>" title="hlekkir">Fréttahlekkir</a></h2>
				<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Hlekkir' ) ) ); ?>" class="more">Sjá alla hlekki</a>
			</div>

			<?php include (TEMPLATEPATH . '/inc/shortcut-links.php'); ?>

			<div class="instagram">
				<iframe src="http://www.intagme.com/in/?h=Z2FyZHlya2phbnxpbnw4NXw0fDN8fHllc3w2fHVuZGVmaW5lZA==" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:404px; height: 303px" ></iframe>
				<a href="http://instagram.com/gardyrkjan/" class="instagram-link">Fleiri myndir á instagram</a>
				<a href="http://instagram.com/gardyrkjan?ref=badge" class="ig-b- ig-b-16"><img src="//badges.instagram.com/static/images/ig-badge-16.png" alt="Instagram" /></a>
			</div>

			<div class="shortcut-buttons">
				<div>
					<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Samstarfssjóður' ) ) ); ?>" class="button-big">Aðlögunarsamningur</a>
					<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fánaröndin' ) ) ); ?>" class="button-big">Fánaröndin</a>
				</div>
			</div>
		</div>
	</div>
</div> <!-- END #main -->

<div class="contact-test"></div>
<?php get_footer(); ?>


