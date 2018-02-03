<?php
/**
 * Apostrophe functions and definitions
 *
 * @package Apostrophe
 */

function apostrophe_enqueue_styles() {
  $parent_style = 'apostrophe-style';
  wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
  wp_enqueue_style('child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array($parent_style),
    wp_get_theme()->get('Version')
  );
}
add_action('wp_enqueue_scripts', 'apostrophe_enqueue_styles');

/*
 * remove Related Posts, which is added by Jetpack
 */

function jetpackme_remove_rp() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jprp = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
        remove_filter( 'the_content', $callback, 40 );
    }
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );

/* 
 * Implement custom header for child theme 
 *
 * NOTE: this line must REPLACE the corresponding line in the base theme functions.php.
 * If upgrading to a new base theme, edit functions.php to comment out the corresponding line.
 * 
 */
require get_template_directory() . '-child/inc/custom-header.php';

