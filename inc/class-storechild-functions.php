<?php
/**
 * Storechild Functions
 *
 * @author   WooThemes
 * @since    1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Storechild_Functions' ) ) :

class Storechild_Functions {

	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		$theme              = wp_get_theme( 'storechild' );
		$storechild_version = $theme['Version'];

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_child_styles' ), 9999 );
	}

	/**
	 * Enqueue Storefront Styles
	 * @return void
	 */
	public function enqueue_styles() {
		global $storefront_version;

		wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css', $storefront_version );
	}

	/**
	 * Enqueue Storechild Styles
	 * @return void
	 */
	public function enqueue_child_styles() {
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
}

endif;

return new Storechild_Functions();
