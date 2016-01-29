<?php
/**
 * Storechild Customizer
 *
 * Handles Customizer tweaks and modifications
 *
 * @author   WooThemes
 * @since    1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Storechild_Customizer' ) ) :

class Storechild_Customizer {

	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'add_customizer_css' ), 1000 );
		add_action( 'customize_register', array( $this, 'customize_storefront_controls_settings' ), 99 );
		add_action( 'after_switch_theme', array( $this, 'set_theme_mods' ) );
	}

	/**
	 * Returns an array with default storefront and extension options
	 * @return array
	 */
	public function storechild_defaults() {
		return array(
			'storefront_header_background_color' => '#000000',
			'storefront_header_text_color'       => '#ffffff',
		);
	}

	/**
	 * Remove / Set Customizer settings (including extensions).
	 * @return void
	 */
	public function customize_storefront_controls_settings( $wp_customize ) {
		// Remove controls that are incompatible with this theme
		$wp_customize->remove_control( 'sd_header_layout' );
		$wp_customize->remove_control( 'sd_button_flat' );
		$wp_customize->remove_control( 'sd_button_shadows' );
		$wp_customize->remove_control( 'sd_button_background_style' );
		$wp_customize->remove_control( 'sd_button_rounded' );
		$wp_customize->remove_control( 'sd_button_size' );
		$wp_customize->remove_control( 'sd_header_layout_divider_after' );
		$wp_customize->remove_control( 'sd_button_divider_1' );
		$wp_customize->remove_control( 'sd_button_divider_2' );

		// Set default values for settings in customizer
		foreach ( Storechild_Customizer::storechild_defaults() as $mod => $val ) {
			$setting = $wp_customize->get_setting( $mod );
			if ( is_object( $setting ) ) {
				$setting->default = $val;
			}
		}
	}

	/**
	 * Set / remove theme mods to suit this theme after activation
	 * @return void
	 */
	public function set_theme_mods() {
		// Remove modifications that are incompatible with this theme.
		// This should mirror the controls removed in storechild_customize_storefront_controls_settings().
		remove_theme_mod( 'sd_header_layout' );
		remove_theme_mod( 'sd_button_flat' );
		remove_theme_mod( 'sd_button_shadows' );
		remove_theme_mod( 'sd_button_background_style' );
		remove_theme_mod( 'sd_button_rounded' );
		remove_theme_mod( 'sd_button_size' );
		remove_theme_mod( 'sd_content_background_color' );

		// Set default values for settings in customizer
		foreach ( Storechild_Customizer::storechild_defaults() as $mod => $val ) {
			if ( ! (bool) get_theme_mod( $mod ) ) {
				set_theme_mod( $mod, $val );
			}
		}
	}

	/**
	 * Add custom CSS based on settings in Storefront core
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

endif;

return new Storechild_Customizer();
