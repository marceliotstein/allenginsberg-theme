<?php
/**
 * Custom Header functionality
 *
 * @package Apostrophe
 */

/**
 * Set up the WordPress core custom header settings.
 */
function apostrophe_custom_header_setup() {
	add_theme_support( 'custom-header', array(
		'default-image'          => '',
		'width'                  => 1048,
		'height'                 => 214,
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'apostrophe_header_style',
	) );
}
add_action( 'after_setup_theme', 'apostrophe_custom_header_setup' );

if ( ! function_exists( 'apostrophe_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 */
 	function apostrophe_header_style() {
	 	$header_image = get_header_image();
		$text_color   = get_header_textcolor();

		/* Output the CSS for our custom styles */
		?>
		<style type="text/css" id="apostrophe-header-css">
		<?php
			/* Do we have a custom header image? */
			if ( get_header_image() ) :
		?>
		.site-branding {
			background: url('<?php echo esc_url( get_header_image() ); ?>') center center;
			background-size: 100%;
                        background-repeat: no-repeat;
			/*min-height: 160px;*/
                        padding: 0px;
                        margin: 0px;
		}
		<?php
			endif;
			/* Has the text been hidden? */
			if ( ! display_header_text() ) :
		?>
		.site-title,
		.site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}

		.site-branding {
			text-align: center;
		}

		.site-logo {
			float: none;
			margin-top: 0;
			margin-bottom: 3.5px;
		}
		<?php
			/* If the user has set a custom color for the text, use that. */
			elseif ( get_theme_support( 'custom-header', 'default-text-color' ) !== $text_color ) :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif; // apostrophe_header_style
