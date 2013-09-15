<?php


// Declare sidebar widget zone
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id'   => 'sidebar-1',
        'description'   => 'These are widgets for the sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
}

// unregister all default WP Widgets
/*
function unregister_default_wp_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);
*/
// Add support for a variety of post formats
//add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image', 'post-thumbnails' ) );

if(function_exists('register_nav_menus')) {
    register_nav_menus(
        array(
            'main_nav' => 'Main menu',
            'footer_nav' => 'footer links'
        )
    );
}

if ( ! function_exists( 'gardyrkja_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own twentyeleven_posted_on to override in a child theme
 *
 * @since gardyrkja 1.0
 */
function gardyrkja_posted_on() {
    printf( __( '<span class="sep"></span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a> ', 'gardyrkja' ),
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date('j F, Y') ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'gardyrkja' ), get_the_author() ) ),
        get_the_author()
    );
}
endif;

if ( ! function_exists( 'gardyrkja_link_date' ) ) :

function gardyrkja_link_date() {
    printf( __( '<time class="entry-date" datetime="%3$s">%4$s</time>', 'gardyrkja' ),
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date('j M') ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'gardyrkja' ), get_the_author() ) ),
        get_the_author()
    );
}
endif;

/*
add_theme_support( 'custom-header', $custom_header_support );

if ( ! function_exists( 'get_custom_header' ) ) {
    // This is all for compatibility with versions of WordPress prior to 3.4.
    define( 'HEADER_TEXTCOLOR', $custom_header_support['default-text-color'] );
    define( 'HEADER_IMAGE', '' );
    define( 'HEADER_IMAGE_WIDTH', $custom_header_support['width'] );
    define( 'HEADER_IMAGE_HEIGHT', $custom_header_support['height'] );
    add_custom_image_header( $custom_header_support['wp-head-callback'], $custom_header_support['admin-head-callback'], $custom_header_support['admin-preview-callback'] );
    add_custom_background();
}
*/


// Replaces the excerpt "more" text by a link

function new_excerpt_more($more) {
    global $post;
    if(is_category() || is_archive()) {
        return '..';
    }
    else {
        return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Sjá meira</a>';
    }
}

add_filter('excerpt_more', 'new_excerpt_more');

/*
function custom_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 9999 );
*/

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } 
    else {
        $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } 
    else 
    {
        $content = implode(" ",$content);
    } 
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}



// add post-thumbnail functionality

if (function_exists('add_theme_support')) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 150 );
    //set_post_thumbnail_size( 150, 100, true ); // Normal post thumbnails, set this to be your default size 
    //add_image_size( 'single-post-image', 665, 9999 );
}
/*
if(function_exists('add_image_size')) {
    add_image_size( 'single-post-image', 665, 9999 ); // Custom size that will crop the image to fit the proportion
    add_image_size( 'test-size', 456, 457 );
    //add_image_size( 'custom-2', 300, 200, false ); // Default is false, "soft proportional crop"
}
*/