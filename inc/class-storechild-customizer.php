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
		add_action( 'wp_enqueue_scripts', array( $this, 'add_customizer_css' ), 1000 );
		add_action( 'customize_register', array( $this, 'edit_default_settings' ), 99 );
		add_action( 'customize_register', array( $this, 'edit_default_controls' ), 99 );
	}

	/**
	 * Returns an array of the desired default Storefront options
	 * @return array
	 */
	public function return_storechild_defaults() {
		return array(
			'storefront_header_background_color' => '#000000',
			'storefront_header_text_color'       => '#ffffff',
		);
	}

	/**
	 * Set default Customizer settings based on Storechild design.
	 * @uses return_storechild_defaults()
	 * @return void
	 */
	public function edit_default_settings( $wp_customize ) {
		// Set default values for settings in customizer
		foreach ( Storechild_Customizer::return_storechild_defaults() as $mod => $val ) {
			$setting = $wp_customize->get_setting( $mod );
			if ( is_object( $setting ) ) {
				$setting->default = $val;
			}
		}
	}

	/**
	 * Modify the default controls
	 * @return void
	 */
	public function edit_default_controls( $wp_customize ) {
		$wp_customize->get_setting( 'storefront_header_text_color' )->transport 	= 'refresh';
	}

	/**
	 * Add CSS using settings obtained from the theme options.
	 * @return void
	 */
	public function add_customizer_css() {
		$header_text_color 		= get_theme_mod( 'storefront_header_text_color', apply_filters( 'storefront_default_header_text_color', '#9aa0a7' ) );

		$style = '
			.main-navigation ul li.smm-active li ul.products li.product h3 {
				color: ' . $header_text_color . ';
			}';

		wp_add_inline_style( 'storefront-child-style', $style );
	}
}

}

return new Storechild_Customizer();