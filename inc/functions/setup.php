<?php
/**
 * Storechild setup functions
 *
 * @package storechild
 */

/**
 * Assign the Storechild version to a variable
 */
$theme              = wp_get_theme( 'storechild' );
$storechild_version = $theme['Version'];

/**
 * Enqueue Storefront Styles
 * @return void
 */
function storechild_enqueue_styles() {
	global $storefront_version;

	wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css', $storefront_version );
}

/**
 * Enqueue Storechild Styles
 * @return void
 */
function storechild_enqueue_child_styles() {
	global $storefront_version, $storechild_version;

	/**
	 * Since Storefront 1.5.3 the core codebase automatically loads child theme stylesheets via `storefront_child_scripts()`
	 * If that function doesn't exist (IE someone is using an old version of Storefront) we'll need to manually enqueue this child themes stylesheet
	 */
	if ( ! function_exists( 'storefront_child_scripts' ) ) {
		wp_enqueue_style( 'storefront-child-style', get_stylesheet_uri(), array( 'storefront-style' ), $storechild_version );
	}

    wp_enqueue_script( 'storechild', get_stylesheet_directory_uri() . '/js/storechild.js', array( 'jquery' ), '1.0', true );
}

/**
 * Adds the .js class to the body
 */
function storechild_javascript_class() {
	if ( ! is_admin() ) {
		echo '<script type="text/javascript">( function( html ) { html.setAttribute( "class", "js" + ( html.getAttribute( "class" ) || "" ) ); } ).call(null, document.documentElement);</script>';
	}
}