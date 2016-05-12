<?php
/**
 * Storechild_Customizer Class
 * Makes adjustments to Storefront cores Customizer implementation.
 *
 * @author   WooThemes
 * @package  Storechild
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Storechild_Customizer' ) ) {
	/**
	 * The Storechild Customizer class
	 */
	class Storechild_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			global $storefront_version;

			add_action( 'wp_enqueue_scripts',                array( $this, 'add_customizer_css' ),    999 );
			add_action( 'customize_register',                array( $this, 'edit_default_controls' ), 99 );
			add_filter( 'storefront_setting_default_values', array( $this, 'storechild_defaults' ) );
		}

		/**
		 * Returns an array of the desired default Storefront options
		 *
		 * @param array $args an array of default values.
		 * @return array
		 */
		public function storechild_defaults( $args ) {
			$args['storefront_header_background_color'] = '#FFA200';
			$args['storefront_accent_color']            = '#FFA200';

			return apply_filters( 'storechild_customizer_defaults', $args );
		}

		/**
		 * Modify the default controls
		 *
		 * @param array $wp_customize the Customizer object.
		 * @return void
		 */
		public function edit_default_controls( $wp_customize ) {
			$wp_customize->get_setting( 'storefront_header_text_color' )->transport = 'refresh';
		}

		/**
		 * Add CSS using settings obtained from the theme options.
		 *
		 * @return void
		 */
		public function add_customizer_css() {
			$header_text_color = get_theme_mod( 'storefront_header_text_color' );

			$style = '
				.site-header {
					color: ' . $header_text_color . ';
				}';

			wp_add_inline_style( 'storefront-child-style', $style );
		}
	}
}

return new Storechild_Customizer();
