<?php
/**
 * Storechild_Customizer Class
 * Makes adjustments to Storefront cores Customizer implementation.
 *
 * @author   WooThemes
 * @since    1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Storechild_Customizer' ) ) {
	class Storechild_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			global $storefront_version;

			add_action( 'wp_enqueue_scripts', array( $this, 'add_customizer_css' ),               999 );
			add_action( 'customize_register', array( $this, 'edit_default_controls' ),            99 );
			add_action( 'customize_register', array( $this, 'edit_default_customizer_settings' ), 99 );
			add_action( 'init',               array( $this, 'default_theme_mod_values' ) );

			if ( version_compare( $storefront_version, '2.0.0', '<' ) ) {
				add_action( 'init',           array( $this, 'default_theme_settings' ) );
			}
		}

		/**
		 * Returns an array of the desired default Storefront options
		 *
		 * @return array
		 */
		public function get_storechild_defaults() {
			return apply_filters( 'storechild_default_settings', $args = array(
				'storefront_header_background_color' => '#FFA200',
				'storefront_header_link_color'       => '#ffffff',
				'storefront_header_text_color'       => '#ffffff',
			) );
		}

		/**
		 * Set default Customizer settings based on Storechild design.
		 *
		 * @uses   get_storechild_defaults()
		 * @return void
		 */
		public function edit_default_customizer_settings( $wp_customize ) {
			foreach ( Storechild_Customizer::get_storechild_defaults() as $mod => $val ) {
				$wp_customize->get_setting( $mod )->default = $val;
			}
		}

		/**
		 * Returns a default theme_mod value if there is none set.
		 *
		 * @uses   get_storechild_defaults()
		 * @return void
		 */
		public function default_theme_mod_values() {
			foreach ( Storechild_Customizer::get_storechild_defaults() as $mod => $val ) {
				add_filter( 'theme_mod_' . $mod, function( $setting ) use ( $val ) {
					return $setting ? $setting : $val;
				});
			}
		}

		/**
		 * Sets default theme color filters for storefront color values.
		 * This function is required for Storefront < 2.0.0 support
		 *
		 * @uses   get_storechild_defaults()
		 * @return void
		 * @todo   remove when Storefront 2.1 is released.
		 */
		public function default_theme_settings() {
			$prefix_regex = '/^storefront_/';
			foreach ( self::get_storechild_defaults() as $mod => $val ) {
				if ( preg_match( $prefix_regex, $mod ) ) {
					$filter = preg_replace( $prefix_regex, 'storefront_default_', $mod );
					add_filter( $filter, function( $setting ) use ( $val ) {
						return $val;
					}, 99 );
				}
			}
		}

		/**
		 * Modify the default controls
		 *
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
				.main-navigation ul li.smm-active li ul.products li.product h3 {
					color: ' . $header_text_color . ';
				}';

			wp_add_inline_style( 'storefront-child-style', $style );
		}
	}
}

return new Storechild_Customizer();
