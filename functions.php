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

function your_widget_display($args) {
   extract($args);
   echo $before_widget;
   echo $before_title . 'My Unique Widget' . $after_title;
   echo $after_widget;
   // print some HTML for the widget to display here
   echo "Your Widget Test";
}

wp_register_sidebar_widget(
    'your_widget_1',        // your unique widget id
    'Your Widget',          // widget name
    'your_widget_display',  // callback function
    array(                  // options
        'description' => 'Description of what your widget does'
    )
);

register_sidebar(array(
  'name' => __( 'Login sidebar' ),
  'id' => 'loginSidebar',
  'description' => __( 'Login sidebar' ),
  'before_title' => '<h1>',
  'after_title' => '</h1>'
));

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
    printf( __( '<span class="sep"></span><time class="entry-date" datetime="%3$s">%4$s</time> ', 'gardyrkja' ),
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
        $excerpt = implode(" ",$excerpt).'..';
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
        $content = implode(" ",$content).'..';
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

function gardyrkja_remove_gallery_css( $css ) {
    return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'gardyrkja_remove_gallery_css' );

function wp_get_attachment( $attachment_id ) {

    $attachment = get_post( $attachment_id );
    return array(
        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink( $attachment->ID ),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}

function the_post_thumbnail_caption($the_post) {

  $thumbnail_id    = get_post_thumbnail_id($the_post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span class="image-caption">'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}

function the_post_thumbnail_has_caption($the_post) {

  $thumbnail_id    = get_post_thumbnail_id($the_post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    
    if($thumbnail_image[0]->post_excerpt != null) {
        return 1;
    }
    else
        return 0;
  }
  else
    return 0;
}

function highlight_search_term($text){
    if(is_search()){
        $keys = implode('|', explode(' ', get_search_query()));
        $text = preg_replace('/(' . $keys .')/iu', '<span class="search-term">\0</span>', $text);
    }
    return $text;
}
add_filter('the_excerpt', 'highlight_search_term');
add_filter('the_title', 'highlight_search_term');

