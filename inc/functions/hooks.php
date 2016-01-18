<?php
/**
 * General setup hooks and filters
 *
 * @package storechild
 */

/**
 * Styles / scripts
 */
add_action( 'wp_enqueue_scripts', 'storechild_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'storechild_enqueue_child_styles', 9999 );

/**
 * Filters
 */
add_filter( 'storefront_custom_header_args', 'storechild_custom_header_defaults' );

/**
 * Extension integrations / tweaks
 */
add_action( 'customize_register', 'storechild_customize_storefront_extensions', 99 );
add_action( 'wp_print_scripts', 'storechild_javascript_class', 0 );
add_action( 'after_switch_theme', 'storechild_set_theme_mods' );
add_action( 'wp', 'storechild_storefront_woocommerce_customiser' );