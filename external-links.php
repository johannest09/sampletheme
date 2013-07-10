<?php
/*
	Sniðmát sem birtir fréttahlekki úr tenglasafni
	http://codex.wordpress.org/Template_Tags/wp_list_bookmarks
*/
?>

<h2>Hér er dæmi um birtingu á hlekkjum</h2>

<?php $args = array(
    'orderby'          => 'name',
    'order'            => 'ASC',
    'limit'            => -1,
    'category'         => ' ',
    'exclude_category' => ' ',
    'category_name'    => 'Fréttahlekkir',
    'hide_invisible'   => 1,
    'show_updated'     => 0,
    'echo'             => 1,
    'categorize'       => 1,
    'title_li'         => 0,
    'title_before'     => '<h2>',
    'title_after'      => '</h2>',
    'category_orderby' => 'name',
    'category_order'   => 'ASC',
    'class'            => ' ',
    'category_before'  => ' ',
    'category_after'   => '</li>' ); 
?> 
<?php wp_list_bookmarks($args); ?>