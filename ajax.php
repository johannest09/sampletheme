<?php
	include("../../../wp-load.php");

	$param = "";
	if(isset($_POST["param"])) {
	    $param = $_POST["param"];
	}

	if(isset($_POST["method"])) {
	    $method = $_POST["method"];
	    if($method=="getAllLinks") {
	       getAllLinks($param);
	    }
	}

	
	/*
	function getAllLinks($param) {
		$bookmarks = get_bookmarks( array(
			'orderby'        => 'name',
			'order'          => 'ASC',
			//'category_name'  => $param
			'category'		 => $param
 		));
		// Loop through each bookmark and print formatted output
		foreach ( $bookmarks as $bookmark ) { 
		    printf( '<li><a class="relatedlink" href="%s">%s</a></li>', $bookmark->link_url, $bookmark->link_name );
		}
	}
	*/

	function getAllLinks($param) {

		$args = array(
			'show_images'	   => 0,
			'show_description' => 1,
		    'orderby'          => 'name',
		    'order'            => 'ASC',
		    'category'         => $param,
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
		    'category_after'   => '</li>' ); ?> 
		
			<?php wp_list_bookmarks( $args );
	}
	
	
?>
