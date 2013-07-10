<?php
/*
* News list
*/
?>

<span class="date"><?php sampletheme_link_date(); ?></span>
<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'sampletheme' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>


