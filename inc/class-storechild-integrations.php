<?php
/**
 * Storechild_Integrations Class
 * Provides integrations with Storefront extensions by removing/changing incompatible controls/settings. Also adjusts default values
 * if they need to differ from the original setting.
 *
 * @author   WooThemes
 * @package  Storechild
 * @since    1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Storechild_Integrations' ) ) {
	/**
	 * The Storechild Integrations class
	 */
	class Storechild_Integrations {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'edit_controls' ), 99 );
		}

		/**
		 * Remove unused/incompatible controls from the Customizer to avoid confusion
		 *
		 * @param array $wp_customize the Customizer object.
		 * @return void
		 */
		public function edit_controls( $wp_customize ) {
			/**
			 * Storefront Designer
			 */
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
	}
}

return new Storechild_Integrations();
