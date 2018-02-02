<?php
/**
 * @package Apostrophe
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/*
	* If our posts have featured images, we'll show them in the grid.
	* Otherwise, we'll fall back to a grey box with an icon representing the post format.
	*/
	///if ( get_the_post_thumbnail() ) :
		// Use a larger image if the post is featured.
		///if ( true === apostrophe_is_featured() ) {
	        ///		$apostrophe_post_thumbnail = get_the_post_thumbnail( $post->ID, 'apostrophe-featured' );
		///} else {
		///	$apostrophe_post_thumbnail = get_the_post_thumbnail();
		///}
		///$apostrophe_has_thumbnail = 'apostrophe-thumb';
	///else :
		$apostrophe_post_thumbnail = '<span></span>';
		$apostrophe_has_thumbnail = 'apostrophe-nothumb';
	///endif; // check for post thumbnail

		/*
		* If the post format is a link, we want to link directly to that link, rather than to the post itself
		*/
	if ( 'link' === get_post_format() ) :
		$apostrophe_permalink = apostrophe_get_url();
	else :
		$apostrophe_permalink = get_permalink();
	endif;

        $excerpt = get_the_excerpt();
        $excerpt = ltrim($excerpt,'[');

	?>

	<h1 class="entry-title">
	  <a href="<?php echo esc_url( $apostrophe_permalink ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h1>
        <div class="entry-footer"><?php apostrophe_entry_footer(); ?></div>
	<div class="entry-meta"><?php apostrophe_posted_on(); ?></div>
        <?php //if (!empty($apostrophe_post_thumbnail)): ?>
        <?php if (!empty(strip_tags($apostrophe_post_thumbnail))): ?>
          <div style="border: 1px">
          </div>
        <?php else: ?>
          <div style="border: 1px">
            <?php //print $excerpt; ?>
          </div>
        <?php endif; ?>
  <header class="entry-header">
		<?php apostrophe_inline_controls(); ?>
		<!--<h2 class="entry-title"><a href="<?php //echo esc_url( $apostrophe_permalink ); ?>" rel="bookmark"><?php //the_title(); ?></a></h2>-->
		<div class="ag-front-excerpt"><?php echo $excerpt; ?></div>
	</header><!-- .entry-header -->

</article><!-- #post-## -->
