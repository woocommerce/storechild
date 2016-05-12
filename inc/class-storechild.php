<?php
/**
 * Storechild Class
 *
 * @author   WooThemes
 * @package  Storechild
 * @since    1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Storechild' ) ) {
	/**
	 * The main Storechild class
	 */
	class Storechild {
		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts',              array( $this, 'enqueue_styles' ) );
			add_filter( 'storefront_google_font_families', array( $this, 'storechild_fonts' ) );
		}

		/**
		 * Enqueue Storefront Styles
		 *
		 * @return void
		 */
		public function enqueue_styles() {
			global $storefront_version, $storechild_version;

			/**
			 * Styles
			 */
			wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css', $storefront_version );
			wp_style_add_data( 'storefront-child-style', 'rtl', 'replace' );

			/**
			 * Javascript
			 */
			wp_enqueue_script( 'storechild', get_stylesheet_directory_uri() . '/assets/js/storechild.min.js', array( 'jquery' ), $storechild_version, true );
		}

		/**
		 * Replaces Source Sans with the Storechild fonts
		 *
		 * @param  array $fonts the desired fonts.
		 * @return array
		 */
		public function storechild_fonts( $fonts ) {
			$fonts = array(
				'alegreya'      => 'Alegreya:400,400italic,700,900',
				'alegreya-sans' => 'Alegreya+Sans:400,400italic,700,900',
			);

			return $fonts;
		}
	}
}

return new Storechild();
