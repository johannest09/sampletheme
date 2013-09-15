<?php
/*
* News list
*/
?>

<div class="newslink">
	<span class="date"><?php gardyrkja_link_date(); ?></span>
	<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'gardyrkja' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
</div>

