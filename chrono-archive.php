<?php
/**
 * Template Name: AG Chronological Archive
 *
 * This template uses the "Advanced Excerpt" plugin to generate a custom archive page
 */
?>
  
<?php get_header(); ?>

<section id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <div class="archive-post-wrapper">
        <h1 class="page-title">Recent Articles</h1>

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

            ?>
            <div class="archive-link archive-link-prev">
            <?php
              previous_posts_link( '« Previous Page' );
            ?>
            </div>
            <?php

            while ($query->have_posts()) {
              $query->the_post();
              $title = get_the_title();
              $link = get_permalink($recent["ID"]);
              $img = get_the_post_thumbnail();
              $date = get_the_date();
              $excerpt = get_the_excerpt();
              ?>
              <div class="front-archive-post">
                <table class="front-post-table">
                  <tr>
                    <td class="front-post-image">
                      <a href="<?php print $link ?>"><?php print $img ?></a>
                    </td>
                    <td class="front-post-text">
                      <div class="front-post-title">
                        <a href="<?php print $link ?>"><?php print $title ?></a>
                      </div>
                      <div class="front-post-summary">
                        <div class="front-post-summary-date"><?php print $date ?></div>
                        <div class="front-post-summary-excerpt"><?php print $excerpt ?></div>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
              <?php
            }

            ?>
            <div class="archive-link archive-link-next">
            <?php
              next_posts_link( 'Next Page »', $query->max_num_pages );
            ?>
            </div>
            <div class="archive-monthly-link">
              <div>Select from Monthly Archive</div>
              <?php
              echo do_shortcode('[archives type="monthly" format="option" select_text="Select Month"]');
              ?>
            </div>
            <?php
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
