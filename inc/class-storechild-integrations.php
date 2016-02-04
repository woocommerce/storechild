<?php
/**
 * Storechild_Integrations Class
 * Provides integrations with Storefront extensions by removing/changing incompatible controls/settings. Also adjusts default values
 * if they need to differ from the original setting.
 *
 * @author   WooThemes
 * @since    2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Storechild_Integrations' ) ) {

class Storechild_Integrations {

	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {
        add_action( 'customize_register', 				array( $this, 'edit_controls' ),                        99 );
        add_action( 'customize_register',               array( $this, 'set_extension_default_settings' ),      99 );
        add_action( 'after_switch_theme', 				array( $this, 'edit_theme_mods' ) );
	}

    /**
	 * Returns an array of the desired Storefront extension settings
	 * @return array
	 */
	public function get_storechild_extension_defaults() {
		return apply_filters( 'storechild_default_extension_settings', $args = array(
            // Storefront Designer
            'sd_content_background_color'   => '#ffffff',
		) );
	}

    /**
	 * Set default settings for Storefront extensions to provide compatibility with Storechild.
	 * @uses get_storechild_extension_defaults()
	 * @return void
	 */
	public function set_extension_default_settings( $wp_customize ) {
		// Set default values for settings in customizer
		foreach ( Storechild_Integrations::get_storechild_extension_defaults() as $mod => $val ) {
			$setting = $wp_customize->get_setting( $mod );
			if ( is_object( $setting ) ) {
				$setting->default = $val;
			}
		}
	}

    /**
	 * Remove unused/incompatible controls from the Customizer to avoid confusion
	 * @return void
	 */
	public function edit_controls( $wp_customize ) {
        $wp_customize->remove_control( 'sd_header_layout' );
		$wp_customize->remove_control( 'sd_button_flat' );
		$wp_customize->remove_control( 'sd_button_shadows' );
		$wp_customize->remove_control( 'sd_button_background_style' );
		$wp_customize->remove_control( 'sd_button_rounded' );
		$wp_customize->remove_control( 'sd_button_size' );
		$wp_customize->remove_control( 'sd_header_layout_divider_after' );
		$wp_customize->remove_control( 'sd_button_divider_1' );
		$wp_customize->remove_control( 'sd_button_divider_2' );
	}

    /**
     * Remove any pre-existing theme mods for settings that are incompatible with Storechild.
     * @return void
     */
    public function edit_theme_mods() {
        remove_theme_mod( 'sd_header_layout' );
        remove_theme_mod( 'sd_button_flat' );
        remove_theme_mod( 'sd_button_shadows' );
        remove_theme_mod( 'sd_button_background_style' );
        remove_theme_mod( 'sd_button_rounded' );
        remove_theme_mod( 'sd_button_size' );
        remove_theme_mod( 'sd_header_layout_divider_after' );
        remove_theme_mod( 'sd_button_divider_1' );
        remove_theme_mod( 'sd_button_divider_2' );
    }
}

}

return new Storechild_Integrations();