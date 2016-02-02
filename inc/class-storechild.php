<?php
/**
 * Storechild Class
 *
 * @author   WooThemes
 * @since    1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Storechild' ) ) {

class Storechild {
	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_child_scripts' ), 99 );
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
	public function enqueue_child_scripts() {
		global $storefront_version, $storechild_version;

		wp_style_add_data( 'storefront-child-style', 'rtl', 'replace' );

		wp_enqueue_script( 'storechild', get_stylesheet_directory_uri() . '/assets/js/storechild.min.js', array( 'jquery' ), $storechild_version, true );
	}
}

}

return new Storechild();