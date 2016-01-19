<?php
/**
 * Storechild custom selectors that adopt Storefront customizer settings
 *
 * @package storechild
 */

/**
 * Add custom CSS based on settings in Storefront core
 * @return void
 */
function storechild_add_customizer_css() {
	$header_text_color 		= storefront_sanitize_hex_color( get_theme_mod( 'storefront_header_text_color', apply_filters( 'storefront_default_header_text_color', '#9aa0a7' ) ) );

	$style = '
		.main-navigation ul li.smm-active li ul.products li.product h3 {
			color: ' . $header_text_color . ';
		}';

	wp_add_inline_style( 'storefront-child-style', $style );
}