<?php
/**
 * @package Apostrophe
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

get_header(); ?>

<?php // prepare post list
  $post_args = array(
            'numberposts' => '3',
            'post_status' =>'publish',
 );
?>
  <section id="primary" class="full-width content-area">
    <main id="main" class="site-main" role="main">
      <div class="ag-front-slider">
        <?php        
          echo do_shortcode('[smartslider3 slider=6]');
        ?>
      </div>
      <div class="ag-front-postlist">
        <table class="front-post-table">
        <?php
          $recent_posts = wp_get_recent_posts($post_args);
	  foreach( $recent_posts as $recent ){
            $meta_descrip = get_post_meta($recent["ID"], '_yoast_wpseo_metadesc', true);
            $thumb = get_the_post_thumbnail($recent["ID"], 'ag-hardcrop');
            $link = get_permalink($recent["ID"]);
            $title = $recent["post_title"];
            ?>
            <tr>
              <td class="front-post-image"><?php print_r($thumb); ?></td>
              <td class="front-post-text">
                <div class="front-post-title"><a href="<?php print $link ?>"><?php print $title ?></a></div>
                <div class="front-post-summary"><?php print_r($meta_descrip); ?></a>
              </td>
            </tr>
            <?
	  }
  	  wp_reset_query();
        ?>
        </table>
      </div>
      <div class="ag-front-featured-video">
         <?php
           //echo do_shortcode("[insert page='featured-video' display='content']");
         ?>
      </div>
      <div class="ag-front-who-was">
         <table class="who-was-table">
           <tr>
             <td>
               <div class="who-was-dig-in-top">Who was Allen Ginsberg?</div>
               <div class="who-was-dig-in-sub">(Dig in and find out.)</div>
             </td>
             <td>
               <img src="wp-content/themes/apostrophe-child/images/who-was-ag.jpg" />
             </td>
           </tr>
         </table>
         <?php
           echo do_shortcode("[insert page='who-was-allen-ginsberg' display='content']");
         ?>
      </div>
      <div class="who-was-clear"></div>
    </main><!-- #main -->
  </section><!-- #primary -->

<?php get_footer(); ?>
