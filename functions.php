<?php
/**
 * Apostrophe functions and definitions
 *
 * @package Apostrophe
 */

function apostrophe_child_fonts_url() {
  $fonts_url = '';

  /* Translators: If there are characters in your language that are not
  * supported by PT Serif, translate this to 'off'. Do not translate
  * into your own language.
  */
  $pt_serif = _x( 'on', 'PT Serif font: on or off', 'apostrophe' );

  /* Translators: If there are characters in your language that are not
  * supported by Open Sans, translate this to 'off'. Do not translate
  * into your own language.
  */
  $open_sans = _x( 'on', 'Open Sans font: on or off', 'apostrophe' );

  if ( 'off' !== $pt_serif || 'off' !== $open_sans ) :
          $font_families = array();

          if ( 'off' !== $pt_serif ) {
                  $font_families[] = 'PT Serif:400,400italic,700,700italic';
          }

          if ( 'off' !== $open_sans ) {
                  $font_families[] = 'Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic';
          }

          // fonts for allenginsberg.org
          $font_families[] = 'Playfair Display:300,400';
          $font_families[] = 'Gentium Basic:400';
          $font_families[] = 'Slabo 27px:400';
          $font_families[] = 'Ovo:100,300,400,400italic,600,700';
          $font_families[] = 'Zilla Slab:300,400,600';
          $font_families[] = 'Josefin Sans:400,600,700';

          $query_args = array(
                  'family' => urlencode( implode( '|', $font_families ) ),
                  'subset' => urlencode( 'latin,latin-ext,cyrillic' ),
          );

          $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

  endif;
  return $fonts_url;
}

function apostrophe_setup() {
  global $content_width;

  /**
   * Set the content width based on the theme's design and stylesheet.
   */
  if ( ! isset( $content_width ) ) {
	$content_width = 723; /* pixels */
  }

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   */
  load_theme_textdomain( 'apostrophe', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  // Load editor styles and custom fonts.
  add_editor_style( array( 'editor-style.css', apostrophe_child_fonts_url() ) );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 450, 450, true );
  add_image_size( 'apostrophe-featured', 930, 450, true );
  add_image_size( 'apostrophe-mini', 60, 60, true );
  add_image_size( 'apostrophe-gallery', 550, 550, true );
  // ag-hardcrop added for AllenGinsberg.org front page
  add_image_size( 'ag-hardcrop', 250, 250, true );

  // This theme two different nav menus: one for site navigation, and one for social media links.
  register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'apostrophe' ),
	'social'  => __( 'Social Menu', 'apostrophe' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
 	'comment-list', 'comment-form', 'search-form', 'gallery', 'caption',
  ) );

  /*
   * Enable support for Post Formats.
   * See http://codex.wordpress.org/Post_Formats
   */
  add_theme_support( 'post-formats', array(
	'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio', 'chat', 'status',
  ) );

  // Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'apostrophe_custom_background_args', array(
 	'default-color' => 'ffffff',
	'default-image' => '',
  ) ) );
}

function apostrophe_child_scripts() {
        wp_enqueue_style( 'apostrophe-fonts', apostrophe_child_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'apostrophe_child_scripts' );

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

