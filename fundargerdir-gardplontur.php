<?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$tmp = $wp_query;
	$wp_query = null;

	$args = array(
	    'order'            	=> 'DESC',
	    'category_name'    	=> 'fundargerdir-gardplontur',
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