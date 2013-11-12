<div class="shortcut-links">
	<div class="links">
		<ul>
			<?php $foo = array(
			'show_images'	   => 0,
			'show_description' => 1,
		    'orderby'          => 'name',
		    'order'            => 'ASC',
		    'limit'            => 5,
		    'category'         => 0,
		    'exclude_category' => '',
		    'category_name'    => 'Fréttahlekkir',
		    'hide_invisible'   => 1,
		    'show_updated'     => 0,
		    'categorize'       => 0,
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
		
			<?php wp_list_bookmarks( $foo ); ?>
		</ul>
		
	</div>
</div>