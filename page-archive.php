<?php
/**
 * Template Name: AG Archive
 *
 * This template uses the "Advanced Excerpt" plugin to generate a custom archive page
 */
?>
  
<?php get_header(); ?>

<section id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <div class="archive-post-wrapper">
        <h1 class="page-title">Archive: Articles</h1>

        <?php
          $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
          $args = array (
            'nopaging'               => false,
            'paged'                  => $paged,
            'posts_per_page'         => '15',
            'post_type'              => 'post',
            'post_status'            => 'publish',
          );

          $query = new WP_Query( $args );

          if ($query->have_posts()) {

            previous_posts_link( '« Previous Page' );

            while ($query->have_posts()) {
              $query->the_post();
              $title = get_the_title();
              $link = get_permalink($recent["ID"]);
              ?>
              <div class="archive-post">
                <div class="archive-post-title"><a href="<?php print $link ?>"><?php print $title ?></a></div>
                <div class="archive-post-summary"><?php the_advanced_excerpt(); ?></a></div>
              </div>
              <?php
            }

            next_posts_link( 'Next Page »', $query->max_num_pages );
        }

        // Restore original Post Data
        wp_reset_postdata();
        ?>
      </table>
    </div>

  </main><!-- #main -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
