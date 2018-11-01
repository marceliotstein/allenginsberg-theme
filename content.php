<?php
/**
 * @package Apostrophe
 *
 * content.php for Allen Ginsberg - used for archive pages, called by archive.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/*
	* If our posts have featured images, we'll show them in the grid.
	* Otherwise, we'll fall back to a grey box with an icon representing the post format.
	*/
	$apostrophe_post_thumbnail = '<span></span>';
	$apostrophe_has_thumbnail = 'apostrophe-nothumb';

	/*
	* If the post format is a link, we want to link directly to that link, rather than to the post itself
	*/
	if ( 'link' === get_post_format() ) :
		$link = apostrophe_get_url();
	else :
		$link = get_permalink();
	endif;

        $title = get_the_title();
        $img = get_the_post_thumbnail();
        $date = get_the_date();
        $excerpt = get_the_excerpt();
        $text_excerpt = preg_replace("/<img[^>]+\>/i", "", $excerpt); 
	?>

        <div class="front-archive-post">
          <table class="front-post-table">
            <tr>
              <td class="front-post-image">
                <a href="<?php echo esc_url($link) ?>"><?php print $img ?></a>
              </td>
              <td class="front-post-text">
                <div class="front-post-title">
                  <a href="<?php echo esc_url($link) ?>"><?php print $title ?></a>
                </div>
                <div class="front-post-summary">
                  <div class="front-post-summary-date"><?php print $date ?></div>
                  <div class="front-post-summary-excerpt"><?php print $text_excerpt ?></div>
                </div>
              </td>
            </tr>
          </table>
        </div>

</article><!-- #post-## -->
