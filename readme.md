# Apostrophe Child Theme for AllenGinsberg.org 

This is a child theme of Apostrophe (WordPress) designed by Marc Eliot Stein for the Allen Ginsberg Project.

Instructions: 

1) install as apostrophe-child in same folder as apostrophe theme.

2) to enable child theme custom header, comment out the following line in base theme functions.php:

  require get_template_directory() . '/inc/custom-header.php';

3) to enable child theme fonts, modify the following line in base theme functions.php in function enqueue_scripts():

  CHANGE:
    wp_enqueue_style( 'apostrophe-fonts', apostrophe_fonts_url(), array(), null );
  TO: 
    wp_enqueue_style( 'apostrophe-fonts', apostrophe_child_fonts_url(), array(), null );

