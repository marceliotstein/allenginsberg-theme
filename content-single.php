<?php
	/**
 * @package Apostrophe
 *
 */
?>
<article id="post-<?php the_ID(); ?>">

	<?php edit_post_link( __( 'Edit', 'apostrophe' ), '<span class="edit-link">', '</span>' ); ?>
	<h1 class="entry-title">
		<?php if ( get_post_format() ) : ?>
		<?php apostrophe_post_format(); ?>
	<?php endif; ?>
	<?php the_title(); ?></h1>
	<div class="entry-meta"><?php apostrophe_posted_on(); ?></div>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'apostrophe' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php apostrophe_entry_footer(); ?>
		<?php apostrophe_post_nav(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
