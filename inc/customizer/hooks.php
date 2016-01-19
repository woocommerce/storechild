<?php
/**
 * General setup hooks and filters
 *
 * @package storechild
 */

/**
 * Add Storechild specific CSS selectors based on customizer settings
 */
add_action( 'wp_enqueue_scripts', 					'storechild_add_customizer_css', 1000 );

/**
 * Customizer default color tweaks
 */

add_filter( 'storefront_default_text_color', 		'storechild_color_black' );
add_filter( 'storefront_default_heading_color', 	'storechild_color_black' );