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
 * Extension integrations / tweaks
 */
add_action( 'wp_print_scripts', 'storechild_javascript_class', 0 );