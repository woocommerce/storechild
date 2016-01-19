<?php
/**
 * General setup hooks and filters
 *
 * @package storechild
 */

/**
 * Add Storechild specific CSS selectors based on customizer settings
 */
add_action( 'wp_enqueue_scripts', 	'storechild_add_customizer_css', 1000 );

add_action( 'customize_register', 'storechild_customize_storefront_controls_settings', 99 );
add_action( 'after_switch_theme', 'storechild_set_theme_mods' );